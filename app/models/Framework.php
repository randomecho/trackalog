<?php

class Framework extends Eloquent {

	protected $table = 'frameworks';

	public $timestamps = false;

	protected $fillable = array(
		'title',
	);

}
