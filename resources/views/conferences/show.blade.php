@extends('layout')

@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="{{ route('conferences.index') }}">Conferences</a></li>
            <li class="active"><a href="{{ route('conferences.show', ['id' => $conference->id]) }}">Conference: {{ $conference->title }}</a></li>
        </ol>

        <h1>{{ $conference->title }}</h1>

        @if ($conference->author_id == Auth::user()->id)
            <p class="pull-right">
                <a href="{{ route('conferences.edit', ['id' => $conference->id]) }}" class="btn btn-default">Edit &nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="{{ route('conferences.delete', ['id' => $conference->id]) }}" class="btn btn-danger">Delete &nbsp;<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </p>
        @endif

        <p><b>Date created:</b>
            {{ $conference->created_at->toFormattedDateString() }}</p>

        <p><b>URL:</b>
            <a href="{{ $conference->url }}">{{ $conference->url }}</a></p>

        <p><b>Description:</b><br>
            <!-- TODO: Figure out how we will be handling HTML/etc. -->
            {{ str_replace("\n", "<br>", $conference->description) }}</p>

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
            <div class="col-md-6">
                <h3>My Talks</h3>
                <p><i>Note: "Submit" just means "mark as submitted." At the moment this isn't actually sending anything to the conference organizers.</i></p>
                <strong>Applied to speak at this conference</strong>
                <ul>
                    @if ($talksAtConference->isEmpty())
                        <li>None</li>
                    @endif
                    @foreach ($talksAtConference as $talkRevision)
                        <li><a href="/submissions" class="btn btn-xs btn-default" data-delete='{{ json_encode(['conferenceId' => $conference->id, 'talkRevisionId' => $talkRevision->id]) }}'>Un-Submit</a>
                            <a href="{{ $talkRevision->getUrl() }}">{{ $talkRevision->title }}</a>
                            <?php /* |  <a href="#" onclick="alert('Not programmed yet');">Change status [accepted, rejected, submitted]</a> */ ?>
                            </li>
                    @endforeach
                </ul>

                <strong>All Talks</strong>
                <ul>
                    @if ($talks->isEmpty())
                        <li>None</li>
                    @endif
                    @foreach ($talks as $talk)
                        <li>{{ $talk->current()->title }}
                            @if (! $talksAtConference->contains($talk->current()))
                                <a href="#" class="btn btn-xs btn-primary" data-post='{{ json_encode(['conferenceId' => $conference->id, 'talkRevisionId' => $talk->current()->id]) }}'>Submit</a>
                            @else
                                <span class="btn btn-xs btn-default" data-delete='{{ json_encode(['conferenceId' => $conference->id, 'talkRevisionId' => $talk->current()->id]) }}'>Un-Submit</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
