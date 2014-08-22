<?php

class NoteController extends BaseController {

	private $_view = 'note/';

	public function index()
	{
		$items = Note::orderBy('id', 'desc')->limit(50)->get();

		return View::make($this->_view.'list',
			array(
				'title' => 'Notes',
				'items' => $items,
			)
		);
	}

	public function create()
	{
		$item = new Note;

		return View::make($this->_view.'edit',
			array(
				'title' => 'Add note',
				'item' => $item,
				'projects' => Project::lists('title', 'id'),
				'frameworks' => Framework::lists('title', 'id'),
			)
		);
	}

	public function edit($id)
	{
		$item = Note::find($id);
		$masters = Note::whereProjectId($item->project_id)->where('parent_id', '=', 0)->where('id', '<>', $item->id)
								->orderBy('id', 'desc')->get()->lists('title', 'id');
		$masters += array('0' => 'new note, not continuing');

		return View::make($this->_view.'edit',
			array(
				'title' => 'Edit note',
				'item' => $item,
				'masters' => $masters,
				'projects' => Project::lists('title', 'id'),
				'frameworks' => Framework::lists('title', 'id'),
			)
		);
	}

	public function show($id)
	{
		return Redirect::action('NoteController@edit', array('id' => $id));
	}

	public function store()
	{
		$info = Input::all();

		$rules = array(
			'title' => 'required',
		);

		if (trim($info['project']) != '')
		{
			$project = Project::firstOrCreate(array('title' => Str::slug($info['project'])));
		}
		elseif (isset($info['project_id']))
		{
			$project = Project::find($info['project_id']);
		}
		else
		{
			$rules['project'] = 'required';
		}

		if (trim($info['framework']) != '')
		{
			$framework = Framework::firstOrCreate(array('title' => Str::slug($info['framework'])));
		}
		elseif (isset($info['framework_id']))
		{
			$framework = Framework::find($info['framework_id']);
		}
		else
		{
			$rules['framework'] = 'required';
		}

		$validation = Validator::make($info, $rules);

		if ($validation->fails())
		{
			return Redirect::action('NoteController@create')->withInput()->withErrors($validation->messages());
		}
		else
		{
			$item = Note::create(array(
				'title' => $info['title'],
				'description' => $info['description'],
				'commits' => $info['commits'],
				'files' => $info['files'],
				'minutes' => (int) $info['minutes'],
				'cost' => (int) $info['cost'],
				'reference' => $info['reference'],
				'when_created' => date("Y-m-d H:i:s"),
				'when_issued' => $info['when_issued'],
				'when_paid' => $info['when_paid'],
			));

			$item->project()->associate($project);
			$item->framework()->associate($framework);
			$item->save();

			Session::flash('success', 'New note added');

			return Redirect::action('NoteController@edit', array('id' => $item->id));
		}
	}

	public function update()
	{
		$info = Input::all();

		$rules = array(
			'title' => 'required',
		);

		if (trim($info['project']) != '')
		{
			$project = Project::firstOrCreate(array('title' => Str::slug($info['project'])));
		}
		elseif (isset($info['project_id']))
		{
			$project = Project::find($info['project_id']);
		}
		else
		{
			$rules['project'] = 'required';
		}

		if (trim($info['framework']) != '')
		{
			$framework = Framework::firstOrCreate(array('title' => Str::slug($info['framework'])));
		}
		elseif (isset($info['framework_id']))
		{
			$framework = Framework::find($info['framework_id']);
		}
		else
		{
			$rules['framework'] = 'required';
		}

		$validation = Validator::make($info, $rules);

		if ($validation->fails())
		{
			return Redirect::action('NoteController@edit', array('id' => $info['id']))->withInput()->withErrors($validation->messages());
		}
		else
		{
			$item = Note::find($info['id']);

			$item->title = $info['title'];
			$item->description = $info['description'];
			$item->commits = $info['commits'];
			$item->files = $info['files'];
			$item->minutes = (int) $info['minutes'];
			$item->cost = (int) $info['cost'];
			$item->reference = $info['reference'];
			$item->parent_id = $info['parent_id'];
			$item->when_touched = date("Y-m-d H:i:s");
			$item->when_issued = $info['when_issued'];
			$item->when_paid = $info['when_paid'];
			$item->project()->associate($project);
			$item->framework()->associate($framework);
			$item->save();

			Session::flash('message', 'Note has been updated');

			return Redirect::action('NoteController@edit', array('id' => $info['id']));
		}
	}

}
