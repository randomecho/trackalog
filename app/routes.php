<?php

Route::get('/', 'NoteController@create');
Route::get('/framework/{slug}', 'FrameworkController@show');
Route::get('/project/{slug}', 'ProjectController@show');
Route::resource('/note', 'NoteController');
