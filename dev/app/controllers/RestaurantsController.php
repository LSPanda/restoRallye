<?php

class RestaurantsController extends \BaseController {

	/**
	 * Display a listing of restaurants
	 *
	 * @return Response
	 */
	public function index()
	{
		$restaurants = Restaurant::all();

		return View::make('restaurants.index', compact('restaurants'));
	}

    /**
     * Display a listing of restaurants for the admin
     *
     * @return Response
     */
    public function adminIndex()
    {
        $restaurants = Restaurant::all();

        return View::make('restaurants.adminIndex', compact('restaurants'));
    }

	/**
	 * Show the form for creating a new restaurant
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('restaurants.create');
	}

	/**
	 * Store a newly created restaurant in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Restaurant::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Restaurant::create($data);

		return Redirect::route('restaurants.index');
	}

	/**
	 * Display the specified restaurant.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$restaurant = Restaurant::findOrFail($id);

		return View::make('restaurants.show', compact('restaurant'));
	}

	/**
	 * Show the form for editing the specified restaurant.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$restaurant = Restaurant::find($id);

		return View::make('restaurants.edit', compact('restaurant'));
	}

	/**
	 * Update the specified restaurant in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$restaurant = Restaurant::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Restaurant::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$restaurant->update($data);

		return Redirect::route('restaurants.index');
	}

	/**
	 * Remove the specified restaurant from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Restaurant::destroy($id);

		return Redirect::route('restaurants.index');
	}

}
