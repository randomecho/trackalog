<?php

class Note extends Eloquent {

	protected $table = 'notes';

	public $timestamps = false;

	protected $fillable = array(
		'title',
		'description',
		'commits',
		'files',
		'minutes',
		'cost',
		'reference',
	);

	public function project()
	{
		return $this->belongsTo('Project');
	}

	public function framework()
	{
		return $this->belongsTo('Framework');
	}

}
