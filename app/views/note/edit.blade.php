@extends('layout.base')

@section('content')
@if (isset($item->id))
	{{ Form::open(array('action' => array('NoteController@update', $item->id), 'method' => 'PUT')) }}
	{{ Form::hidden('id', $item->id) }}
@else
	{{ Form::open(array('action' => array('NoteController@store'))) }}
@endif

{{ Form::label('title', 'Title') }}
{{ Form::text('title', $item->title, array('autofocus', 'required')) }}

{{ Form::label('project', 'Project') }}
@if (count($projects) > 0)
	<div class="form-group">
	{{ Form::select('project_id', $projects, $item->project_id) }} or new
	{{ Form::text('project', null, array('class' => 'medium-field')) }}
	</div>
@else
	{{ Form::text('project', null, array('required')) }}
@endif

{{ Form::label('framework', 'Framework') }}
@if (count($frameworks) > 0)
	<div class="form-group">
	{{ Form::select('framework_id', $frameworks, $item->framework_id) }} or new
	{{ Form::text('framework', null, array('class' => 'medium-field')) }}
	</div>
@else
	{{ Form::text('framework', null, array('required')) }}
@endif

{{ Form::label('parent_id', 'Continuing') }}
@if (isset($masters) && count($masters) > 0)
	{{ Form::select('parent_id', $masters, $item->parent_id) }}
@endif

{{ Form::label('description', 'Notes') }}
{{ Form::textarea('description', $item->description) }}
{{ Form::label('commits', 'Commits') }}
{{ Form::textarea('commits', $item->commits) }}
{{ Form::label('files', 'Files affected') }}
{{ Form::textarea('files', $item->files) }}
<div class="row">
<div class="half">
{{ Form::label('minutes', 'Minutes') }}
{{ Form::text('minutes', $item->minutes, array('class' => 'huge-field')) }}
</div>
<div class="half">
{{ Form::label('cost', 'Cost') }}
{{ Form::text('cost', $item->cost, array('class' => 'huge-field')) }}
</div>
</div>
<div class="row">
<div class="third">
{{ Form::label('reference', 'Reference') }}
{{ Form::text('reference', $item->reference) }}
</div>
<div class="third">
{{ Form::label('when_issued', 'Issued') }}
{{ Form::text('when_issued', $item->when_issued) }}
</div>
<div class="third">
{{ Form::label('when_paid', 'Paid on') }}
{{ Form::text('when_paid', $item->when_paid) }}
</div>
</div>

{{ Form::submit('Save') }}
{{ Form::close() }}
@stop