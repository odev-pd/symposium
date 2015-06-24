<?php namespace Symposium\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Conference;
use Illuminate\Support\Collection;
use Input;
use JoindIn\Client;
use Log;
use Redirect;
use Session;
use Symposium\Exceptions\ValidationException;
use Symposium\Services\CreateConferenceForm;
use Validator;
use View;

class ConferencesController extends BaseController
{
    protected $account_rules = [
        'title' => 'required',
        'description' => 'required',
        'url' => 'required',
    ];

    public function __construct()
    {
        $this->beforeFilter(
            'auth',
            [
                'only' => [
                    'create',
                    'store',
                    'edit',
                    'update',
                    'destroy'
                ]
            ]
        );
    }

    /**
     * Display all conferences
     *
     * @return Response
     */
    public function index()
    {
        switch (Input::get('filter')) {
            case 'favorites':
                $conferences = Auth::user()->favoritedConferences()->get();
                break;
            case 'open_cfp':
                $conferences = Conference::openCfp()->get();
                break;
            case 'unclosed_cfp':
                $conferences = Conference::unclosedCfp()->get();
                break;
            case 'all':
                $conferences = Conference::all();
                break;
            case 'future':
                // Pass through
            default:
                $conferences = Conference::future()->get();
        }

        switch (Input::get('sort')) {
            case 'date':
                $conferences->sortBy(function (Conference $model) {
                    return $model->starts_at;
                });
                break;
            case 'closing_next':
                // Forces closed CFPs to the end. I feel dirty. Even dirtier with the 500 thing.
                $conferences
                    ->sortBy(function (Conference $model) {
                        if ($model->cfp_ends_at > Carbon::now()) {
                            return $model->cfp_ends_at;
                        } elseif ($model->cfp_ends_at === null) {
                            return Carbon::now()->addYear(500);
                        } else {
                            return $model->cfp_ends_at->addYear(1000);
                        }
                    });
                break;
            case 'alpha':
                // Pass through
            default:
                $conferences->sortBy(function (Conference $model) {
                    return strtolower($model->title);
                });
                break;
        }

        return View::make('conferences.index')
            ->with('conferences', $conferences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('conferences.create')
            ->with('conference', new Conference());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $form = CreateConferenceForm::fillOut(Input::all(), Auth::user());

        try {
            $conference = $form->complete();
        } catch (ValidationException $e) {
            return Redirect::to('conferences/create')
                ->withErrors($e->errors())
                ->withInput();
        }

        Session::flash('message', 'Successfully created new conference.');

        return Redirect::to('/conferences/' . $conference->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        if (Auth::guest()) {
            return $this->showPublic($id);
        }

        try {
            $conference = Conference::where('id', $id)->firstOrFail();
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Session::flash('error-message', 'Sorry, but that isn\'t a valid URL.');
            Log::error($e);
            return Redirect::to('/');
        }

        $talksAtConference = $conference->myTalks();
        $myTalks = Auth::user()->talks;

        return View::make('conferences.show')
            ->with('conference', $conference)
            ->with('author', $conference->author)
            ->with('talksAtConference', $talksAtConference)
            ->with('talks', $myTalks);
    }

    private function showPublic($id)
    {
        $conference = Conference::findOrFail($id);

        return View::make('conferences.showPublic')
            ->with('conference', $conference);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  str $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $conference = Conference::where('id', $id)->firstOrFail();
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Session::flash('error-message', 'Sorry, but that isn\'t a valid URL.');
            Log::error($e);
            return Redirect::to('/');
        }

        if ($conference->author->id != Auth::user()->id) {
            Session::flash('error-message', 'Sorry, but you don\'t own that conference.');
            Log::error('User ' . Auth::user()->id . ' tried to edit a conference they don\'t own.');
            return Redirect::to('/');
        }

        return View::make('conferences.edit')
            ->with('conference', $conference);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  str $id
     * @return Response
     */
    public function update($id)
    {
        $data = Input::all();

        $rules = $this->account_rules;

        // Make validator
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            // Pull
            $conference = Conference::where('id', $id)->firstOrFail();

            // Validate ownership
            if ($conference->author->id != Auth::user()->id) {
                Session::flash('error-message', 'Sorry, but you don\'t own that conference.');
                Log::error('User ' . Auth::user()->id . ' tried to edit a conference they don\'t own.');
                return Redirect::to('/');
            }

            // Default to null
            foreach (['starts_at', 'ends_at', 'cfp_starts_at', 'cfp_ends_at'] as $col) {
                $nullableDates[$col] = Input::get($col) ?: null;
            }

            // Save
            $conference->title = Input::get('title');
            $conference->description = Input::get('description');
            $conference->url = Input::get('url');
            $conference->starts_at = $nullableDates['starts_at'];
            $conference->ends_at= $nullableDates['ends_at'];
            $conference->cfp_starts_at = $nullableDates['cfp_starts_at'];
            $conference->cfp_ends_at = $nullableDates['cfp_ends_at'];
            $conference->author_id = Auth::user()->id;

            // Add author
            $conference->save();

            Session::flash('message', 'Successfully edited conference.');

            return Redirect::to('conferences/' . $conference->id);
        }

        return Redirect::to('conferences/' . $id . '/edit')
            ->withErrors($validator)
            ->withInput();
    }

    /**
     * Show the confirmation for deleting the specified resource
     *
     * @param  int $id
     * @return Resource
     */
    public function delete($id)
    {
        dd('t');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $conference = Conference::where('id', $id)->firstOrFail();

        // Validate ownership
        if ($conference->author->id != Auth::user()->id) {
            Session::flash('error-message', 'Sorry, but you don\'t own that conference.');
            Log::error('User ' . Auth::user()->id . ' tried to delete a conference they don\'t own.');
            return Redirect::to('/');
        }

        Session::flash('success-message', 'Conference successfully deleted.');
        $conference->delete();

        return Redirect::to('conferences');
    }

    public function favorite($conferenceId)
    {
        $user = Auth::user();

        $user->favoritedConferences()->attach($conferenceId);

        return Redirect::back();
    }

    public function unfavorite($conferenceId)
    {
        $user = Auth::user();

        $user->favoritedConferences()->detach($conferenceId);

        return Redirect::back();
    }
}
