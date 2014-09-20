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
		'parent_id',
		'when_created',
		'when_updated',
		'when_issued',
		'when_paid',
	);

	public function master()
	{
		return $this->belongsTo('Note', 'parent_id', 'id');
	}

	public function continued()
	{
		return $this->hasMany('Note');
	}

	public function project()
	{
		return $this->belongsTo('Project');
	}

	public function framework()
	{
		return $this->belongsTo('Framework');
	}

	/**
	 * Remove duplicate line items
	 *
	 * Creates alpha sorted list based on newline character, skipping duplicates
	 *
	 * @param  string  bunch of lines
	 * @return string
	 */
	public function deduplicate_lines($text)
	{
		$jumble_lines = explode("\n", $text);
		asort($jumble_lines);
		$clean_lines = '';
		$tracked = array();

		foreach ($jumble_lines as $raw_line)
		{
			if (trim($raw_line) != '')
			{
				$raw_line = str_replace("\\", '/', $raw_line);

				if ( ! isset($tracked[$raw_line]))
				{
					$tracked[$raw_line] = true;
					$clean_lines .= $raw_line. "\n";
				}
			}
		}

		return trim($clean_lines);
	}
}
