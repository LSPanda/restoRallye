<?php

class GiftsController extends \BaseController {

	/**
	 * Display a listing of gifts
	 *
	 * @return Response
	 */
	public function index()
	{
		$gifts = Gift::all();

		return View::make('gifts.index', compact('gifts'));
	}

	/**
	 * Show the form for creating a new gift
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('gifts.create');
	}

	/**
	 * Store a newly created gift in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Gift::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Gift::create($data);

		return Redirect::route('gifts.index');
	}

	/**
	 * Display the specified gift.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gift = Gift::findOrFail($id);

		return View::make('gifts.show', compact('gift'));
	}

	/**
	 * Show the form for editing the specified gift.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gift = Gift::find($id);

		return View::make('gifts.edit', compact('gift'));
	}

	/**
	 * Update the specified gift in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gift = Gift::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Gift::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gift->update($data);

		return Redirect::route('gifts.index');
	}

	/**
	 * Remove the specified gift from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gift::destroy($id);

		return Redirect::route('gifts.index');
	}

}
