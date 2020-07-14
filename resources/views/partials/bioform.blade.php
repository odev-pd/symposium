<x-input.text
    name="nickname"
    label="*Nickname"
    :value="$bio->nickname"
></x-input.text>

<x-input.textarea
    name="body"
    label="*Body"
    class="mt-8"
    :value="$bio->body"
></x-input.textarea>

<div class="mt-8">
    {!! Form::label('public', '*Show on public speaker profile?', [
        'class' => 'block text-indigo-500 font-bold mb-2'
    ]) !!}
    <label class="inline-flex items-center">
        <input
            type="radio"
            class="form-radio"
            name="public"
            value="yes"
            {{ $bio->public ? 'checked' : '' }}
        >
        <span class="ml-2">Yes</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            class="form-radio"
            name="public"
            value="no"
            {{ $bio->public ? '' : 'checked' }}
        >
        <span class="ml-2">No</span>
    </label>
</div>
