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
{{ Form::text('project', null, array('required')) }}

{{ Form::label('framework', 'Framework') }}
{{ Form::text('framework', null, array('required')) }}

{{ Form::label('description', 'Notes') }}
{{ Form::textarea('description', $item->description) }}

{{ Form::label('commits', 'Commits') }}
{{ Form::textarea('commits', $item->commits) }}

{{ Form::label('files', 'Files affected') }}
{{ Form::textarea('files', $item->files) }}

{{ Form::label('minutes', 'Minutes') }}
{{ Form::text('minutes', $item->minutes) }}

{{ Form::label('cost', 'Cost') }}
{{ Form::text('cost', $item->cost) }}

{{ Form::label('reference', 'Reference') }}
{{ Form::text('reference', $item->reference) }}

{{ Form::submit('Save') }}

{{ Form::close() }}

@stop