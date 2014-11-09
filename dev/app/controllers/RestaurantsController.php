<?php
use App\Forms\Restaurant as FormRestaurant;

class RestaurantsController extends \BaseController {

    protected $formRestaurant;

    public function __construct (FormRestaurant $formRestaurant) {
        $this->formRestaurant = $formRestaurant;
    }

    /**
     * Display a listing of restaurants
     *
     * @return Response
     */
    public function index () {
        $restaurants = Restaurant::all ();

        if (Auth::check () && Auth::getUser ()->role == 'a' && Request::is ( 'admin*' ))
        {
            return View::make ( 'restaurants.admin.index', compact ( 'restaurants' ) );
        }
        else
        {
            return View::make ( 'restaurants.index', compact ( 'restaurants' ) );
        }
    }

    /**
     * Show the form for creating a new restaurant
     *
     * @return Response
     */
    public function create () {
        return View::make ( 'restaurants.admin.create' );
    }

    /**
     * Store a newly created restaurant in storage.
     *
     * @return Response
     */
    public function store () {
        $validator = Validator::make ( $data = Input::all (), Restaurant::$rules );

        if ($validator->fails ())
        {
            return Redirect::back ()->withErrors ( $validator )->withInput ();
        }

        Restaurant::create ( $data );

        return Redirect::route ( 'restaurants.admin.index' );
    }

    /**
     * Display the specified restaurant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show ($id) {
        $restaurant = Restaurant::findOrFail ( $id );

        if (Auth::check () && Auth::getUser ()->role == 'a' && Request::is ( 'admin*' ))
        {
            return View::make ( 'restaurants.admin.show', compact ( 'restaurant' ) );
        }
        else
        {
            return View::make ( 'restaurants.show', compact ( 'restaurant' ) );
        }
    }

    /**
     * Show the form for editing the specified restaurant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit ($id) {
        $restaurant = Restaurant::find ( $id );

        return View::make ( 'restaurants.admin.edit', compact ( 'restaurant' ) );
    }

    /**
     * Update the specified restaurant in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update ($id) {
        $this->formRestaurant->validate ( Input::all () );

        $restaurant = Restaurant::findOrFail ( $id );

        $restaurant->update ( Input::all () );

        return Redirect::route ( 'admin.restaurants.show', $id );
    }

    /**
     * Remove the specified restaurant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy ($id) {
        Restaurant::destroy ( $id );

        return Redirect::route ( 'restaurants.admin.index' );
    }

}
