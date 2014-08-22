<?php

class FrameworkController extends BaseController {

	private $_view = 'framework/';

	public function index()
	{
		$items = Framework::orderBy('title', 'asc')->get();

		return View::make($this->_view.'index',
			array(
				'title' => 'Frameworks used',
				'items' => $items,
			)
		);
	}

	public function show($slug)
	{
		$framework = Framework::whereTitle($slug)->first();
		$items = Note::whereFrameworkId($framework->id)->limit(250)->orderBy('id', 'desc')->get();

		return View::make($this->_view.'list',
			array(
				'title' => 'Notes for '.$framework->title,
				'items' => $items,
			)
		);
	}

}
