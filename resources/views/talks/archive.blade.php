@extends('layout')

@section('content')

    <div class="container body">
        <div class="row">
            <div class="col-md-8 col-md-push-2">

                <h2 class="page-title">Archive</h2>
                <a href="/talks" class="btn btn-default btn-xs">Back</a>

                <p class="list-sort">Sort: <a href="{{ route('talks.archive') }}?sort=alpha"{{ $sorting_talk['alpha'] }}>Title</a> | <a
                            href="{{ route('talks.archive') }}?sort=date"{{ $sorting_talk['date'] }}>Date</a></p>
                <ul class="list-talks">
                    @forelse ($talks as $talk)
                        <li>
                            @include ('partials.talk-in-list', ['talk' => $talk])
                        </li>
                    @empty
                        <li>
                            No talks yet.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@stop
