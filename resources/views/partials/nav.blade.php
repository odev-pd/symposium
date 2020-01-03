<nav>
    <div :class="slotProps.showNav ? 'block' : 'hidden'" class="px-2 pt-2 pb-4 sm:flex">
        @if (Auth::check())
            <a class="block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ route('bios.index') }}">Bios</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ route('conferences.index') }}">Conferences</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ route('calendar.index') }}">Calendar</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ route('talks.index') }}">Talks</a>
            {{-- <li class="" role="presentation">
                <a class="" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <img src="{{ Auth::user()->profile_picture_thumb }}" class="nav-profile-picture inline"> Me <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <a href="{{ route('account.show') }}">Account</a>
                    @if (Auth::user()->enable_profile)
                    <a href="{{ route('speakers-public.show', [Auth::user()->profile_slug]) }}">Public Speaker Profile</a>
                    @endif
                    <a href="{{ route('log-out') }}">Log out</a>
                </ul> --}}

        @else
            <a class="block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ url('what-is-this') }}">How it Works</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ url('speakers') }}">Our speakers</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 uppercase" href="{{ route('conferences.index') }}">Conferences</a>
            <a class="mt-1 sm:mt-0 sm:ml-2 block px-2 py-1 text-indigo font-semibold rounded hover-bg-indigo-800 border rounded" href="{{ route('login') }}">Sign in</a>
            {{-- Disable email registration --}}
            {{-- <a href="{{ route('register') }}">Sign up</a> --}}
        @endif
    </div>
</nav>
