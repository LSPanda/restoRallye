<?php
use App\Forms\Restaurant as FormRestaurant;
use App\Forms\Image as ImageRestaurant;
use App\Helpers\Slug as HelperSlug;

class RestaurantsController extends \BaseController {

    protected $formRestaurant, $imageRestaurant, $helperSlug;

    public function __construct (FormRestaurant $formRestaurant,
                                 ImageRestaurant $imageRestaurant,
                                 HelperSlug $helperSlug) {
        $this->formRestaurant  = $formRestaurant;
        $this->imageRestaurant = $imageRestaurant;
        $this->helperSlug      = $helperSlug;
    }

    /**
     * Display a listing of restaurants
     *
     * @return Response
     */
    public function index () {
        $restaurants = Restaurant::paginate ( 9 );

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

        // TODO Prendre une image de couverture (voir dans RallyesController
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
            $images = $this->getImages ( 'restaurants', $id );
            $photos = false;
            if ($images)
            {
                $photos = \Illuminate\Support\Facades\Paginator::make ( $images, count ( $images ), 15 );
            }

            return View::make ( 'restaurants.show', compact ( 'restaurant', 'photos' ) );
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
     * Show the media management page
     *
     * @param $id_restaurant
     *
     * @return mixed
     */
    public function editMedias ($id_restaurant) {
        $photos          = $this->getImages ( 'restaurants', $id_restaurant );
        $photoCouverture = $this->getImageCouverture ( 'restaurants', $id_restaurant );

        return View::make ( 'restaurants.admin.medias', compact ( 'photos', 'photoCouverture', 'id_restaurant' ) );
    }

    /**
     * Delete a media from the gallery
     *
     * @param $id_restaurant
     * @param $file
     *
     * @return mixed
     */
    public function destroyMedia ($id_restaurant, $file) {
        $url = public_path () . '/uploads/restaurants/' . $id_restaurant . '/' . $file;
        if (file_exists ( $url ))
        {
            unlink ( $url );
        }

        return Redirect::route ( 'admin.restaurants.medias', $id_restaurant );
    }

    /**
     * Add pictures into the gallery
     *
     * @param $id_restaurant
     *
     * @return mixed
     */
    public function addMedia ($id_restaurant) {
        $images = Input::file ( 'images' );
        if ($images[ 0 ] != null)
        {
            foreach ($images as $image)
            {
                $mime = explode ( '/', $image->getMimeType () );
                if ($mime[ 0 ] == 'image')
                {
                    // Si il n'y a pas de couverture existante on prend le premier fichier comme couverture
                    if ($this->getImageCouverture ( 'restaurants', $id_restaurant ))
                    {
                        $filename = time () . str_random ( 12 ) . '.' . $image->getClientOriginalExtension ();
                    }
                    else
                    {
                        $filename = 'main.' . $image->getClientOriginalExtension ();
                    }

                    if ($image->move ( 'uploads/restaurants/' . $id_restaurant, $filename ))
                    {
                        $uploadedImages[ ] = $filename;
                    }

                    return Redirect::route ( 'admin.restaurants.medias', $id_restaurant );
                }
                else
                {
                    return Redirect::route ( 'admin.restaurants.medias', $id_restaurant )
                                   ->withErrors ( [
                                       'images' => 'Le fichier ' .
                                                   $image->getClientOriginalName () .
                                                   'n\'est pas une image.'
                                   ] );
                }
            }
        }
        else
        {
            return Redirect::route ( 'admin.restaurants.medias', $id_restaurant )
                           ->withErrors ( [ 'images' => 'Vous avez oublié les fichiers.' ] );
        }
    }

    /**
     * Set the picture given as couverture
     *
     * @param $id_restaurant
     * @param $file
     *
     * @return mixed
     */
    public function setCouverture ($id_restaurant, $file) {
        $url = public_path () . '/uploads/restaurants/' . $id_restaurant . '/';
        if (file_exists ( $url ))
        {
            // Ancienne couverture
            $oldFile = $this->getImageCouverture ( 'restaurants', $id_restaurant );
            $old     = explode ( '.', $oldFile );
            $ext     = '.' . array_pop ( $old );

            rename ( $url . $oldFile, $url . time () . str_random ( 12 ) . $ext );

            // Nouvelle couverture
            $new = explode ( '.', $file );
            $ext = '.' . array_pop ( $new );

            rename ( $url . $file, $url . 'main' . $ext );
        }

        return Redirect::route ( 'admin.restaurants.medias', $id_restaurant );
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
