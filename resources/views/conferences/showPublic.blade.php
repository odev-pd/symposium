@extends('layout')

@section('content')
    <div class="container body">
        <h1>{{ $conference->title }}</h1>

        <p><b>Date created:</b>
            {{ $conference->created_at->toFormattedDateString() }}</p>

        <p><b>URL:</b>
            <a href="{{ $conference->url }}">{{ $conference->url }}</a></p>

        <p><b>Description:</b><br>
            <!-- TODO: Figure out how we will be handling HTML/etc. -->
            {!! str_replace("\n", "<br>", $conference->description) !!}</p>

        @if ($conference->joindin_id)
            <p><b>JoindIn ID:</b>
                <a href="http://joind.in/event/view/{{ $conference->joindin_id }}">{{ $conference->joindin_id }}</a></p> </p>
        @endif

        <hr>

        <div class="row">
            <div class="col-md-6">
                <p><b>Date conference starts:</b>
                    {{ $conference->startsAtDisplay() }}</p>

                <p><b>Date conference ends:</b>
                    {{ $conference->endsAtDisplay() }}</p>

                <p><b>Date CFP opens:</b>
                    {{ $conference->cfpStartsAtDisplay() }}</p>

                <p><b>Date CFP closes:</b>
                    {{ $conference->cfpEndsAtDisplay() }}</p>
            </div>
        </div>
    </div>
@stop
