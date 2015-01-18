<?php

class RallyesController extends \BaseController {

	/**
	 * Display a listing of rallyes
	 *
	 * @return Response
	 */
	public function index() {
		$rallyes = Rallye::where( 'date', '<', date( 'Y-m-d' ) )->paginate(9);

		if ( Auth::check() && Auth::getUser()->role == 'a' && Request::is( 'admin*' ) ) {
			$restaurants = [ ];

			foreach ( $rallyes as $rallye ) {
				$restaurants[ $rallye->id ][ ] = $rallye->restaurants();
			}

			return View::make( 'rallyes.admin.index', compact( 'rallyes', 'restaurants' ) );
		} else {
			$nextRallye = Rallye::where( 'date', '>', date( 'Y-m-d' ) )->first();

			return View::make( 'rallyes.index', compact( 'rallyes', 'nextRallye' ) );
		}
	}

	/**
	 * Show the form for creating a new rallye
	 *
	 * @return Response
	 */
	public function create() {
		return View::make( 'rallyes.create' );
	}

	/**
	 * Store a newly created rallye in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$validator = Validator::make( $data = Input::all(), Rallye::$rules );

		if ( $validator->fails() ) {
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		Rallye::create( $data );

		return Redirect::route( 'rallyes.index' );
	}

	/**
	 * Display the specified rallye.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show( $id ) {
		$rallye = Rallye::findOrFail( $id );

		$restaurants = $rallye->restaurants()->get();

		return View::make( 'rallyes.show', compact( 'rallye', 'restaurants' ) );
	}

	/**
	 * Show the form for editing the specified rallye.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$rallye = Rallye::find( $id );

		return View::make( 'rallyes.edit', compact( 'rallye' ) );
	}

	/**
	 * Update the specified rallye in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {
		$rallye = Rallye::findOrFail( $id );

		$validator = Validator::make( $data = Input::all(), Rallye::$rules );

		if ( $validator->fails() ) {
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		$rallye->update( $data );

		return Redirect::route( 'rallyes.index' );
	}

	/**
	 * Remove the specified rallye from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy( $id ) {
		Rallye::destroy( $id );

		return Redirect::route( 'rallyes.index' );
	}

}
