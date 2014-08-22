@extends('layout.base')

@section('content')
<table>
	<thead><tr>
	<th>Framework</th>
	</tr></thead>
	<tbody>
	@foreach ($items as $item)
	<tr>
	<td><a href="{{ action('FrameworkController@show', array('slug' => $item->title )) }}">{{ $item->title }}</a></td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop