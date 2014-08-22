<?php

class ProjectController extends BaseController {

	private $_view = 'project/';

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
