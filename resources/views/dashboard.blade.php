@extends('layout', ['title' => 'Dashboard'])

@section('headerScripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.5/dist/alpine.js" defer></script>
@endsection

@section('content')

<div class="flex py-4 max-w-md mx-auto sm:max-w-6xl flex-col md:flex-row">
    <div class="w-full md:w-1/2 lg:w-1/3">
        <x-panel class="mt-4">
            <div class="bg-white h-16 flex content-end justify-center">
                <div class="bg-white rounded-full w-24 h-24 mt-4 border-2 border-indigo-800 p-1">
                    <div class="w-full h-full rounded-full">
                        <img
                            src="{{ auth()->user()->profile_picture_hires }}"
                            class="rounded-full"
                            alt="profile picture"
                        >
                    </div>
                </div>
            </div>
            <div class="bg-indigo-100 p-4 pt-12 text-center">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </x-panel>
    </div>
    <div class="w-full md:w-1/2 lg:w-2/3 md:ml-4">
        <x-panel class="mt-4">
            <div class="px-4 py-4 bg-white flex flex-row content-center justify-between">
                <h2 class="m-0 font-sans text-xl uppercase text-gray-500">Talks</h2>
                <a href="{{ route('talks.create') }}" class="text-indigo">
                    @svg('plus', 'w-3 fill-current inline') Add Talk
                </a>
            </div>
            @forelse ($talks as $talk)
                <div class="bg-indigo-100 px-4 py-2 border-b last:border-b-0 flex flex-row justify-between content-center">
                    <div>
                        <h3 class="font-sans text-lg font-semibold">{{ $talk->current()->title }}</h3>
                        <p>
                            {{ $talk->current()->length }}-minute {{ $talk->current()->level }} {{ $talk->current()->type }}
                        </p>
                    </div>
                    <div x-data="{open: false}" class="relative">
                        <a x-on:click="open = true">
                            @svg('dots', 'w-4 inline')
                        </a>
                        <ul class="absolute right-0 mt-1 z-50 bg-white rounded border border-gray-300"
                            x-show="open"
                            x-on:click.away="open = false" >
                            <li class="py-2 px-8 border-b border-gray-300">Edit</li>
                            <li class="py-2 px-8 border-b border-gray-300">Delete<li>
                            <li class="py-2 px-8">Archive<li>
                        </ul>
                    </div>

                </div>
            @empty
                No Talks
            @endforelse
        </x-panel>

        <x-panel class="mt-4">
            <div class="px-4 py-4 bg-white flex flex-row content-center justify-between">
                <h2 class="m-0 font-sans text-xl uppercase text-gray-500">Bios</h2>
                <a href="{{ route('bios.create') }}" class="text-indigo">
                    @svg('plus', 'w-3 fill-current inline') Add Bio
                </a>
            </div>
            @forelse ($bios as $bio)
                <div class="bg-indigo-100 px-4 py-2 border-b last:border-b-0">
                    <h3 class="font-sans text-lg font-semibold">{{ $bio->nickname }}</h3>
                </div>
            @empty
                No Talks
            @endforelse
        </x-panel>
    </div>
</div>

@endsection
