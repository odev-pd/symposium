<div class="form-group">
    {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
    {{ Form::text('title', $conference->title, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
    {{ Form::textarea('description', $conference->description, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('url', 'URL', ['class' => 'control-label']) }}
    {{ Form::text('url', $conference->url, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('starts_at', 'Conference Start Date', ['class' => 'control-label']) }}
    {{ Form::input('date', 'starts_at', $conference->starts_at ? $conference->starts_at->format('Y-m-d') : 'mm/dd/yyyy', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('ends_at', 'Conference End Date', ['class' => 'control-label']) }}
    {{ Form::input('date', 'ends_at', $conference->ends_at ? $conference->ends_at->format('Y-m-d') : 'mm/dd/yyyy', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('cfp_starts_at', 'CFP Open Date', ['class' => 'control-label']) }}
    {{ Form::input('date', 'cfp_starts_at', $conference->cfp_starts_at ? $conference->cfp_starts_at->format('Y-m-d') : 'mm/dd/yyyy', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('cfp_ends_at', 'CFP Close Date', ['class' => 'control-label']) }}
    {{ Form::input('date', 'cfp_ends_at', $conference->cfp_ends_at ? $conference->cfp_ends_at->format('Y-m-d') : 'mm/dd/yyyy', ['class' => 'form-control']) }}
</div>

@if ($conference->joindin_id)
    <div class="form-group">
        {{ Form::label('joindin_id', 'JoindIn ID', ['class' => 'control-label']) }}
        <p class="form-control-static">{{ $conference->joindin_id }}</p>
    </div>
@endif
