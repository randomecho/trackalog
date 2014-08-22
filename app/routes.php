<?php

Route::get('/', 'NoteController@create');
Route::resource('/note', 'NoteController');
