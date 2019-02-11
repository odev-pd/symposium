<?php

namespace App\Http\Controllers;

use App\Acceptance;
use App\Submission;
use Illuminate\Http\Request;

class AcceptancesController extends Controller
{
    public function store(Request $request)
    {
        $submission = Submission::findOrFail($request->input('submissionId'));
        if (auth()->user()->id != $submission->talkRevision->talk->author_id) {
            return response('', 401);
        }

        $acceptance = Acceptance::createFromSubmission($submission);

        return response()->json([
            'status' => 'success',
            'message' => 'Talk Accepted!',
            'acceptanceId' => $acceptance->id,
        ]);
    }

    public function destroy(Acceptance $acceptance)
    {
        if (auth()->user()->id != $acceptance->submission->talkRevision->talk->author_id) {
            return response('', 401);
        }

        $acceptance->delete();

        return response()->json(['status' => 'success', 'message' => 'Talk un-marked as accepted.']);
    }
}
