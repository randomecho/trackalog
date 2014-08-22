@extends('layout.base')

@section('content')
<table>
	<thead><tr>
	<th>Summary</th>
	<th>Minutes</th>
	<th>Cost</th>
	<th>Project</th>
	<th>Reference</th>
	</tr></thead>
	<tbody>
	@foreach ($items as $item)
	<tr>
	<td><a href="{{ action('NoteController@edit', array('id' => $item->id )) }}">{{ $item->title }}</a></td>
	<td>{{ $item->minutes }}</td>
	<td>{{ $item->cost }}</td>
	@if (isset($item->project->title))
	<td><a href="{{ action('ProjectController@show', array('slug' => $item->project->title )) }}">{{ $item->project->title }}</a></td>
	@else
	<td>&nbsp;</td>
	@endif
	<td>{{ $item->reference }}</td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop