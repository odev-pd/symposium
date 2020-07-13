<x-input.text
    name="title"
    label="*Talk Title"
    :value="$current->title"
></x-input.text>

<div class="mt-8">
    {!! Form::label('type', '*Type of Talk', [
        'class' => 'block text-indigo-500 font-bold mb-2'
    ]) !!}
    <label class="inline-flex items-center">
        <input
            type="radio"
            class="form-radio"
            name="type"
            value="seminar" {{ $current->type == 'seminar' ? 'checked' : '' }}
        >
        <span class="ml-2">Seminar</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            class="form-radio"
            name="type"
            value="workshop" {{ $current->type == 'workshop' ? 'checked' : '' }}
        >
        <span class="ml-2">Workshop</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            class="form-radio"
            name="type"
            value="lightning" {{ $current->type == 'lightning' ? 'checked' : '' }}
        >
        <span class="ml-2">Lightning</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            name="type"
            value="keynote" {{ $current->type == 'keynote' ? 'checked' : '' }}
        >
        <span class="ml-2">Keynote</span>
    </label>
</div>

<div class="mt-8">
    {!! Form::label('level', '*Difficulty Level', [
        'class' => 'block text-indigo-500 font-bold mb-2'
    ]) !!}
    <label class="inline-flex items-center">
        <input
            type="radio"
            name="level"
            value="beginner" {{ $current->level == 'beginner' ? 'checked' : '' }}
        >
        <span class="ml-2">Beginner</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            name="level"
            value="intermediate" {{ $current->level == 'intermediate' ? 'checked' : '' }}
        >
        <span class="ml-2">Intermediate</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            name="level"
            value="advanced" {{ $current->level == 'advanced' ? 'checked' : '' }}
        >
        <span class="ml-2">Advanced</span>
    </label>
</div>

<x-input.text
    name="length"
    label="*Length (mins)"
    class="mt-8"
    :value="$current->length"
></x-input.text>

<div class="mt-8">
    {!! Form::label('public', '*Show on public speaker profile?', [
        'class' => 'block text-indigo-500 font-bold mb-2'
    ]) !!}
    <label class="inline-flex items-center">
        <input
            type="radio"
            name="public"
            value="yes" {{ $talk->public ? 'checked' : '' }}
        >
        <span class="ml-2">Yes</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input
            type="radio"
            name="public"
            value="no" {{ $talk->public ? '' : 'checked' }}
        >
        <span class="ml-2">No</span>
    </label>
</div>

<div class="mt-8">
    {!! Form::label('description', 'Description', [
        'class' => 'block text-indigo-500 font-bold mb-2'
    ]) !!} <span> (markdown supported)</span>
    {!! Form::textarea('description', $current->description, [
        'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
    ]) !!}
</div>

<x-input.text
    name="slides"
    label="Slides URL"
    :value="$current->slides"
    class="mt-8"
></x-input.text>

<div class="mt-8">
    {!! Form::label('organizer_notes', 'Organizer Notes', [
        'class' => 'block text-indigo-500 font-bold mb-2'
    ]) !!}
    {!! Form::textarea('organizer_notes', $current->organizer_notes, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
</div>
