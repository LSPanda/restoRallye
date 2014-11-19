<?php

class NewsletterEmailsController extends \BaseController {

	/**
	 * Display a listing of newsletteremails
	 *
	 * @return Response
	 */
	public function index()
	{
		$newsletteremails = Newsletteremail::all();

		return View::make('newsletteremails.index', compact('newsletteremails'));
	}

	/**
	 * Show the form for creating a new newsletteremail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('newsletteremails.create');
	}

	/**
	 * Store a newly created newsletteremail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Newsletteremail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Newsletteremail::create($data);

		return Redirect::route('newsletteremails.index');
	}

	/**
	 * Display the specified newsletteremail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$newsletteremail = Newsletteremail::findOrFail($id);

		return View::make('newsletteremails.show', compact('newsletteremail'));
	}

	/**
	 * Show the form for editing the specified newsletteremail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$newsletteremail = Newsletteremail::find($id);

		return View::make('newsletteremails.edit', compact('newsletteremail'));
	}

	/**
	 * Update the specified newsletteremail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$newsletteremail = Newsletteremail::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Newsletteremail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$newsletteremail->update($data);

		return Redirect::route('newsletteremails.index');
	}

	/**
	 * Remove the specified newsletteremail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Newsletteremail::destroy($id);

		return Redirect::route('newsletteremails.index');
	}

}
