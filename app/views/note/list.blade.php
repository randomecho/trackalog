@extends('layout.base')

@section('content')
<table>
	<thead><tr>
	<th>Summary</th>
	<th>Minutes</th>
	<th>Cost</th>
	<th>Project</th>
	<th>Framework</th>
	<th>Reference</th>
	</tr></thead>
	<tbody>
	@foreach ($items as $item)
	<tr>
	<td><a href="{{ action('NoteController@edit', array('id' => $item->id )) }}">{{ $item->title }}</a></td>
	<td>{{ $item->minutes }}</td>
	<td>{{ $item->cost }}</td>
	<td>{{ (isset($item->project->title) ? $item->project->title : '') }}</td>
	<td>{{ (isset($item->framework->title) ? $item->framework->title : '') }}</td>
	<td>{{ $item->reference }}</td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop