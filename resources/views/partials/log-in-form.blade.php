{!! Form::open(['route' => 'login']) !!}
    {{ csrf_field() }}

    @if ($errors->default->first('email'))
        <p class="mt-2 text-sm text-red-500 italic">
            {{ $errors->default->first('email') }}
        </p>
    @endif

    <x-input.text
        name="email"
        label="Email"
        placeholder="Email address"
        :hideLabel="true"
        autofocus="autofocus"
    ></x-input.text>
    @if ($errors->loginForm->first('email'))
        <p class="mt-2 text-sm text-red-500 italic">
            {{ $errors->loginForm->first('email') }}
        </p>
    @endif

    <x-input.text
        name="password"
        label="Password"
        type="password"
        placeholder="Password"
        :hideLabel="true"
        class="mt-2"
    ></x-input.text>
    @if ($errors->loginForm->first('password'))
        <p class="mt-2 text-sm text-red-500 italic">
            {{ $errors->loginForm->first('password') }}
        </p>
    @endif

    <div class="mt-8 md:flex md:justify-between">
        <x-button.primary
            type="submit"
            size="md"
            class="block"
        >
            Log in
        </x-button.primary>

        <a href="/password/reset" class="block hover:border-indigo lg:ml-10 lg:mt-0 lg:px-10 lg:py-5 md:inline-block md:px-8 md:py-4 md:text-left mt-4 px-4 py-2 rounded rounded-lg text-center text-indigo whitespace-no-wrap">Reset Password</a>
    </div>
{!! Form::close() !!}
