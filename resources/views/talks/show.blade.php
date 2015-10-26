@extends('layout')

@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="{{ route('talks.index') }}">Talks</a></li>
            <li><a href="{{ route('talks.show', ['id' => $talk->id]) }}">{{ $current->title }}</a></li>
        </ol>

        <div class="pull-right">
        @if ($showingRevision)
            <a href="/talks/{{ $talk->id }}" class="btn btn-default">Return to talk &nbsp;<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>

            <h3>Revisions</h3>
            <ul>
                @foreach ($talk->revisions as $revision)
                    <li {{ $revision->id == $current->id ? 'style="font-weight: bold;"' : '' }}>
                        <a href="/talks/{{ $talk->id }}?revision={{ $revision->id }}">{{ $revision->created_at }}</a> {{ $talk->current()->id == $revision->id ? '<i>(current)</i>' : '' }}
                    </li>
                @endforeach
            </ul>
        @else
            <a href="/talks/{{ $talk->id }}?revision={{ $talk->current()->id }}" class="btn btn-default">Show Revisions &nbsp;<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a>
            <a href="/talks/{{ $talk->id }}/edit" class="btn btn-primary">Edit &nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            <a href="/talks/{{ $talk->id }}/delete" class="btn btn-danger">Delete &nbsp;<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        @endif
        </div>

        @if ($current === null)
            <p>No revisions yet. @todo Throw exception etc.</p>
        @else

        @if ($showingRevision)
            REVISION: {{ $current->created_at }}
        @endif

        <h1>{{ $current->title }}</h1>

        <div class="row">
            <div class="col-lg-6">
                <p style="font-style: italic;">
                    {{ $current->length }} minute {{ $current->level }} {{ $current->type }}
                </p>

                <h3>Description/Proposal</h3>
                {{ $current->getHtmledDescription() }}

                <h3>Organizer Notes</h3>
                {{ $current->getHtmledOrganizerNotes() }}

                @if ($current->slides)
                <h3>Slides</h3>
                <a href="{{ $current->slides }}">{{ $current->slides }}</a>
                @endif
            </div>
        </div>
        @endif

    </div>
@stop
