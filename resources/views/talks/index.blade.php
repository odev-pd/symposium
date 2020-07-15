@extends('layouts.index', ['title' => 'My Talks'])

@php
    $linkRouteKeysWithDefaults = ['filter' => 'active', 'sort' => 'alpha'];
    $inactiveLinkClasses = 'filter-link py-1 px-5 hover:bg-indigo-100';
@endphp

@section('content')

@section('sidebar')
    <div class="flex md:flex-col">
        <x-panel size="sm" class="w-1/2 md:w-full font-sans">
            <div class="bg-indigo-150 p-4">Filter</div>
            <div class="flex flex-col py-4">
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'talks.index', 'Active', ['filter' => 'active'], ['class' => $inactiveLinkClasses]) !!}
                <a href="{{ route('talks.archived.index') }}" class="{{ $inactiveLinkClasses }}">Archived</a>
            </div>
        </x-panel>

        <x-panel size="sm" class="w-1/2 md:w-full mt-4 font-sans">
            <div class="bg-indigo-150 p-4">Sort</div>
            <div class="flex flex-col py-4">
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'talks.index', 'Title', ['sort' => 'alpha'], ['class' => $inactiveLinkClasses]) !!}
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'talks.index', 'Date', ['sort' => 'date'], ['class' => $inactiveLinkClasses]) !!}
            </div>
        </x-panel>
    </div>
    <x-button.primary
        :href="route('talks.create')"
        icon="plus"
        class="block mt-4 w-full"
    >
        Add Talk
    </x-button.primary>
@endsection

@section('list')
    @each('talks.listing', $talks, 'talk', 'talks.listing-empty')
@endsection
