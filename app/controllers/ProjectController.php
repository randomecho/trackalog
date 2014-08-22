<?php

class ProjectController extends BaseController {

	private $_view = 'project/';

	public function index()
	{
		$items = Project::orderBy('title', 'asc')->get();

		return View::make($this->_view.'index',
			array(
				'title' => 'Projects used',
				'items' => $items,
			)
		);
	}

	public function show($slug)
	{
		$project = Project::whereTitle($slug)->first();
		$items = Note::whereProjectId($project->id)->limit(250)->orderBy('id', 'desc')->get();

		return View::make($this->_view.'list',
			array(
				'title' => 'Notes for '.$project->title,
				'items' => $items,
			)
		);
	}

}
