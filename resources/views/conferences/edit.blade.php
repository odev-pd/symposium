@extends('layout', ['title' => 'Edit Conference'])

@section('content')

<div class="px-10 py-3 max-w-md mx-auto sm:max-w-3xl border-2 border-indigo-200 bg-white rounded mt-4">
    <ul class="errors">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>

    {!! Form::open(array('action' => array('ConferencesController@update', $conference->id), 'class' => 'edit-conference-form', 'method' => 'put')) !!}

    @include('partials.conferenceform')

    @if (auth()->user()->isAdmin())
        {!! Form::label('is_approved', 'Conference Is Approved?', [
            'class' => 'block text-indigo-500 font-bold mb-2'
        ]) !!}
        <label class="inline-flex items-center">
            <input
                type="radio"
                class="form-radio"
                name="type"
                value="1"
                {{ $conference->is_approved ? 'checked' : '' }}
            >
            <span class="ml-2">Yes</span>
        </label>
        <label class="inline-flex items-center">
            <input
                type="radio"
                class="form-radio"
                name="type"
                value="1"
                {{ $conference->is_approved ? '' : 'checked' }}
            >
            <span class="ml-2">No</span>
        </label>
    @endif

    {!! Form::submit('Update', [
        'class' => 'bg-indigo-500 font-semibold mt-8 px-8 py-2 rounded text-white text-lg'
    ]) !!}

    {!! Form::close() !!}
</div>

@endsection
