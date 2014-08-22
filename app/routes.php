<?php

Route::get('/', 'NoteController@create');
Route::get('/framework', 'FrameworkController@index');
Route::get('/framework/{slug}', 'FrameworkController@show');
Route::get('/project', 'ProjectController@index');
Route::get('/project/{slug}', 'ProjectController@show');
Route::resource('/note', 'NoteController');
