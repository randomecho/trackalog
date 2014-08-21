<?php

class Project extends Eloquent {

	protected $table = 'projects';

	public $timestamps = false;

	protected $fillable = array(
		'title',
	);

}
