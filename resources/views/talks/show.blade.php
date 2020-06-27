@extends('layout')

@php
    $baseLinkClasses = 'filter-link p-1 rounded';
    $activeLinkClasses = 'font-bold text-indigo-500'
@endphp

@section('content')

<div class="flex flex-col md:flex-row py-3 max-w-md mx-auto sm:max-w-3xl mt-4">
    <div class="w-full md:w-1/4">
        <div class="w-1/2 md:w-full border-2 border-indigo-200 bg-white rounded font-sans">
            <div class="bg-indigo-150 p-4">Revisions</div>
            <div class="flex flex-col p-4">
                @foreach ($talk->revisions as $revision)
                    @if ($talk->current()->id == $revision->id)
                        <a href="/talks/{{ $talk->id }}" class="{{ $baseLinkClasses }} {{ $revision->id == $current->id ? $activeLinkClasses : '' }}">{{ $revision->created_at }} <i>(current)</i></a>
                    @else
                        <a href="/talks/{{ $talk->id }}?revision={{ $revision->id }}" class="{{ $baseLinkClasses }} {{ $revision->id == $current->id ? $activeLinkClasses : '' }}">{{ $revision->created_at }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="w-full md:w-3/4 md:ml-4 bg-white p-10 border-2 border-indigo-200 rounded">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="m-0 font-sans text-2xl">{{ $current->title }}</h2>
                <p style="font-style: italic;">
                    {{ $current->length }} minute {{ $current->level }} {{ $current->type }}
                </p>
            </div>
            <div class="text-indigo-500 text-lg">
                @unless ($showingRevision)
                    <a href="/talks/{{ $talk->id }}/edit" class="ml-3" title="Edit">
                        @svg('compose', 'w-5 fill-current inline')
                    </a>
                    <a href="/talks/{{ $talk->id }}/delete" class="ml-3" title="Delete">
                        @svg('trash', 'w-5 fill-current inline')
                    </a>
                    @if ($talk->isArchived())
                        <a href="{{ route('talks.restore', ['id' => $talk->id]) }}" class="ml-3" title="Restore">
                            @svg('folder-outline', 'w-5 fill-current inline')
                        </a>
                    @else
                        <a href="{{ route('talks.archive', ['id' => $talk->id]) }}" class="ml-3" title="Archive">
                            @svg('folder', 'w-5 fill-current inline')
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <h3 class="text-lg font-normal text-gray-500 mt-4">Description/Proposal</h3>

        {!! markdown($current->getDescription()) !!}

        <h3 class="text-lg font-normal text-gray-500 mt-4">Organizer Notes</h3>
        {!! $current->getHtmledOrganizerNotes() !!}

        @if ($current->slides)
            <h3 class="text-lg font-normal text-gray-500 mt-4">Slides</h3>
            <a href="{{ $current->slides }}">{{ $current->slides }}</a>
        @endif
    </div>
</div>

@endsection
