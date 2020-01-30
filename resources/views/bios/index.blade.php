@extends('layout', ['title' => 'All Bios'])

@section('content')
    <div class="body">
        <div class="row">
            <div class="flex py-3 max-w-md mx-auto sm:max-w-3xl">
                <div class="w-1/4">
                    <a href="{{ route('bios.create') }}" class="mt-4 w-full bg-indigo-500 text-white rounded px-4 py-2 block text-center">Add Bio &nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                </div>
                <div class="w-3/4 ml-4">
                    @forelse ($bios as $bio)
                        <div class="border-2 border-indigo-200 rounded mt-4 hover:border-indigo">
                            <div class="bg-white p-4">
                                <div class="flex items-center justify-between">
                                    <h3 class="m-0 font-sans text-2xl">
                                        <a href="{{ route('bios.show', ['id' => $bio->id]) }}">
                                            {{ $bio->nickname }}
                                        </a>
                                    </h3>
                                    <div class="text-indigo-500 text-lg">
                                        <a href="{{ route('bios.edit', ['id' => $bio->id]) }}" title="Edit">
                                          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('bios.delete', ['id' => $bio->id]) }}" class="ml-3" title="Delete">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                        <button type="button" data-clipboard data-clipboard-text="{{ $bio->body }}" title="Copy" class="ml-3">
                                            {{-- @svg('clipboard', 'fill-current align-text-bottom h-5') --}}
                                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3 font-sans text-gray-500">
                                    {{ $bio->nickname }}
                                </div>
                            </div>
                        </div>
                    @empty
                        @include ('partials.bio-in-list-empty')
                    @endforelse

                  {{-- @each('partials.bio-in-list', $bios, 'bio', 'partials.bio-in-list-empty') --}}
                </div>
            </div>
        </div>

    </div>
@stop
