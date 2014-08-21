<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
<title>-|-</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="generator" content="randomecho.com">
<link rel="stylesheet" href="/main.css">
</head><body>
<header></header>
@if (Session::has('success'))
	<div class="alert">{{ Session::get('success') }}</div>
@endif
@if (Session::has('message'))
	<div class="alert">{{ Session::get('message') }}</div>
@endif
@if (Session::has('warning'))
	<div class="alert">{{ Session::get('warning') }}</div>
@endif
@if (Session::has('danger'))
	<div class="alert">{{ Session::get('danger') }}</div>
@endif
@if (!$errors->isEmpty())
	<div class="alert">
	@foreach ($errors->all() as $error)
		{{ $error }}
	@endforeach
	</div>
@endif