<?php

class Project extends Eloquent {

	protected $table = 'projects';

	public $timestamps = false;

	protected $fillable = array(
		'title',
	);

	public static function note()
	{
		return $this->hasMany('Note');
	}

}
