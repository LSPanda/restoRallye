<?php
use App\Forms\Restaurant as FormRestaurant;
use App\Helpers\Slug as HelperSlug;

class RestaurantsController extends \BaseController {

    protected $formRestaurant, $helperSlug;

    public function __construct (FormRestaurant $formRestaurant, HelperSlug $helperSlug) {
        $this->formRestaurant = $formRestaurant;
        $this->helperSlug     = $helperSlug;
    }

    /**
     * Display a listing of restaurants
     *
     * @return Response
     */
    public function index () {
        $restaurants = Restaurant::paginate(9);

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
        $this->formRestaurant->validate ( Input::all () );

        $inputs = Input::all ();

        $inputs[ 'slug' ] = $this->helperSlug->setSlugAttribute ( $inputs[ 'name' ], new Restaurant() );

        Restaurant::create ( $inputs );

        return Redirect::route ( 'admin.restaurants.index' );
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
        $inputs     = Input::all ();

        if ($restaurant->name != $inputs[ 'name' ])
        {
            $inputs[ 'slug' ] = $this->helperSlug->setSlugAttribute ( $inputs[ 'name' ], new Restaurant() );
        }

        $restaurant->update ( $inputs );

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

        return Redirect::route ( 'admin.restaurants.index' );
    }

}
