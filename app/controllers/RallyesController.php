<?php
use App\Forms\Rallye as FormRallye;
use App\Forms\RallyeCreate as FormRallyeCreate;

class RallyesController extends \BaseController {
    protected $formRallye, $formRallyeCreate;

    public function __construct (FormRallye $formRallye, FormRallyeCreate $formRallyeCreate) {
        $this->formRallye       = $formRallye;
        $this->formRallyeCreate = $formRallyeCreate;
    }

    /**
     * Display a listing of rallyes
     *
     * @return Response
     */
    public function index () {
        $nextRallye = Rallye::where ( 'date', '>', date ( 'Y-m-d' ) )->first ();

        if (Auth::check () && Auth::getUser ()->role == 'a' && Request::is ( 'admin*' ))
        {
            $rallyes = Rallye::where ( 'date', '<', date ( 'Y-m-d' ) )->get ();

            $nextRallye->restaurants = $nextRallye->restaurants ()->get ();

            $restaurants = [ ];

            foreach ($rallyes as $rallye)
            {
                $restaurants[ $rallye->id ] = $rallye->restaurants ()->get ();
            }

            return View::make ( 'rallyes.admin.index', compact ( 'rallyes', 'nextRallye', 'restaurants' ) );
        }
        else
        {
            $rallyes = Rallye::where ( 'date', '<', date ( 'Y-m-d' ) )->paginate ( 9 );

            return View::make ( 'rallyes.index', compact ( 'rallyes', 'nextRallye' ) );
        }
    }

    /**
     * Show the form for creating a new rallye
     *
     * @return Response
     */
    public function create () {
        return View::make ( 'rallyes.admin.create' );
    }

    /**
     * Store a newly created rallye in storage.
     *
     * @return Response
     */
    public function store () {
        $input = Input::all ();

        $input[ 'date' ] = $input[ 'dateYear' ] . '-' . $input[ 'dateMonth' ] . '-' . $input[ 'dateDay' ];
        unset( $input[ 'dateYear' ], $input[ 'dateMonth' ], $input[ 'dateDay' ] );

        $this->formRallyeCreate->validate ( $input );

        $filename = 'main.' . Input::file ( 'image' )->getClientOriginalExtension ();

        $rallye = Rallye::create ( $input );

        Input::file ( 'image' )->move ( 'uploads/rallyes/' . $rallye->id, $filename );

        return Redirect::route ( 'admin.rallyes.index' );
    }

    /**
     * Display the specified rallye.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show ($id) {
        $rallye = Rallye::findOrFail ( $id );

        $rallyeDate = new DateTime( $rallye->date );
        $today      = new DateTime();

        $photos      = false;
        $restaurants = false;
        $diff        = $today->diff ( $rallyeDate );

        if ($diff->invert == 1)
        {
            $restaurants = $rallye->restaurants ()->get ();
        }
        $images = $this->getImages ( 'rallyes', $id );
        if ($photos)
        {
            $photos = \Illuminate\Support\Facades\Paginator::make ( $images, count ( $images ), 15 );
        }

        return View::make ( 'rallyes.show', compact ( 'rallye', 'restaurants', 'photos' ) );
    }

    /**
     * Show the form for editing the specified rallye.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit ($id) {
        $rallye = Rallye::find ( $id );

        $rallye->dateDay   = date ( 'd', strtotime ( $rallye->date ) );
        $rallye->dateMonth = date ( 'm', strtotime ( $rallye->date ) );
        $rallye->dateYear  = date ( 'Y', strtotime ( $rallye->date ) );

        return View::make ( 'rallyes.admin.edit', compact ( 'rallye' ) );
    }

    /**
     * Show the media management page
     *
     * @param $id_restaurant
     *
     * @return mixed
     */
    public function editMedias ($id_rallye) {
        $photos          = $this->getImages ( 'rallyes', $id_rallye );
        $photoCouverture = $this->getImageCouverture ( 'rallyes', $id_rallye );

        return View::make ( 'rallyes.admin.medias', compact ( 'photos', 'photoCouverture', 'id_rallye' ) );
    }

    /**
     * Delete a media from the gallery
     *
     * @param $id_rallye
     * @param $file
     *
     * @return mixed
     */
    public function destroyMedia ($id_rallye, $file) {
        $url = public_path () . '/uploads/rallyes/' . $id_rallye . '/' . $file;
        if (file_exists ( $url ))
        {
            unlink ( $url );
        }

        return Redirect::route ( 'admin.rallyes.medias', $id_rallye );
    }

    /**
     * Add pictures into the gallery
     *
     * @param $id_rallye
     *
     * @return mixed
     */
    public function addMedia ($id_rallye) {
        $images = Input::file ( 'images' );
        if ($images[ 0 ] != null)
        {
            foreach ($images as $image)
            {
                $mime = explode ( '/', $image->getMimeType () );
                if ($mime[ 0 ] == 'image')
                {
                    // Si il n'y a pas de couverture existante on prend le premier fichier comme couverture
                    if ($this->getImageCouverture ( 'rallyes', $id_rallye ))
                    {
                        $filename = time () . str_random ( 12 ) . '.' . $image->getClientOriginalExtension ();
                    }
                    else
                    {
                        $filename = 'main.' . $image->getClientOriginalExtension ();
                    }

                    if ($image->move ( 'uploads/rallyes/' . $id_rallye, $filename ))
                    {
                        $uploadedImages[ ] = $filename;
                    }

                    return Redirect::route ( 'admin.rallyes.medias', $id_rallye );
                }
                else
                {
                    return Redirect::route ( 'admin.rallyes.medias', $id_rallye )
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
            return Redirect::route ( 'admin.rallyes.medias', $id_rallye )
                           ->withErrors ( [ 'images' => 'Vous avez oublié les fichiers.' ] );
        }
    }

    /**
     * Set the picture given as couverture
     *
     * @param $id_rallye
     * @param $file
     *
     * @return mixed
     */
    public function setCouverture ($id_rallye, $file) {
        $url = public_path () . '/uploads/rallyes/' . $id_rallye . '/';
        if (file_exists ( $url ))
        {
            // Ancienne couverture
            $oldFile = $this->getImageCouverture ( 'rallyes', $id_rallye );
            $old     = explode ( '.', $oldFile );
            $ext     = '.' . array_pop ( $old );

            rename ( $url . $oldFile, $url . time () . str_random ( 12 ) . $ext );

            // Nouvelle couverture
            $new = explode ( '.', $file );
            $ext = '.' . array_pop ( $new );

            rename ( $url . $file, $url . 'main' . $ext );
        }

        return Redirect::route ( 'admin.rallyes.medias', $id_rallye );
    }

    /**
     * Update the specified rallye in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update ($id) {
        $input           = Input::all ();
        $input[ 'date' ] = $input[ 'dateYear' ] . '-' . $input[ 'dateMonth' ] . '-' . $input[ 'dateDay' ];
        unset( $input[ 'dateYear' ], $input[ 'dateMonth' ], $input[ 'dateDay' ] );

        $this->formRallye->validate ( $input );

        $rallye = Rallye::findOrFail ( $id );

        $rallye->update ( $input );

        return Redirect::route ( 'admin.rallyes.index' );
    }

    /**
     * Remove the specified rallye from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy ($id) {
        Rallye::destroy ( $id );

        return Redirect::route ( 'admin.rallyes.index' );
    }

}
