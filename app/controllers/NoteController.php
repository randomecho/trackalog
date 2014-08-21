<?php

class NoteController extends BaseController {

	private $_view = 'note/';

	public function index()
	{
		return View::make('hello');
	}

	public function create()
	{
		$item = new Note;

		return View::make($this->_view.'edit',
			array(
				'title' => 'Add note',
				'item' => $item,
			)
		);
	}

	public function edit($id)
	{
		$item = Note::whereId($id)->first();

		return View::make($this->_view.'edit',
			array(
				'title' => 'Edit note',
				'item' => $item,
			)
		);
	}

	public function show($id)
	{
		return Redirect::action('NoteController@edit', array('id' => $id));
	}

	public function store()
	{
		$rules = array(
			'title' => 'required',
		);
		$info = Input::all();
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
			));

			Session::flash('success', 'New note added');

			return Redirect::action('NoteController@edit', array('id' => $item->id));
		}
	}

	public function update()
	{
		$rules = array(
			'title' => 'required',
		);
		$info = Input::all();
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

			$item->save();

			Session::flash('message', 'Note has been updated');

			return Redirect::action('NoteController@edit', array('id' => $info['id']));
		}
	}

}
