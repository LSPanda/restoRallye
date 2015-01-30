<?php
use App\Forms\User as FormUser;
use App\Forms\UserSignin as FormUserSignin;

class UsersController extends \BaseController {

	protected $formUser;
	protected $formUserSignin;

	public function __construct( FormUser $formUser, FormUserSignin $formUserSignin ) {
		$this->formUser       = $formUser;
		$this->formUserSignin = $formUserSignin;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index() {
		$users    = User::whereRole( 'u' )->get();
		$adresses = User::whereRole( 'u' )->get( [ 'postal_code', 'city' ] );

		$cities       = array_unique( array_column( $adresses->toArray(), 'city' ) );
		$postal_codes = array_unique( array_column( $adresses->toArray(), 'postal_code' ) );

		return View::make( 'users.admin.index', compact( 'users', 'cities', 'postal_codes' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Show the form for signing in.
	 * GET /inscriptions
	 *
	 * @return Response
	 */
	public function signin() {
		return View::make( 'users.signin' );
	}

	public function doSignin() {
		$this->formUserSignin->validate( Input::all() );
		$inputs = Input::all();

		// Deletes non necessary keys
		$inputs[ 'email' ] = $inputs[ 'emailIns' ];
		unset( $inputs[ 'emailIns' ] );
		$inputs[ 'password' ] = Hash::make( $inputs[ 'passwordIns' ] );
		unset( $inputs[ 'passwordIns' ] );
		unset( $inputs[ 'passwordConf' ] );

		$user = User::create( $inputs );

		Auth::loginUsingId( $user->id );

		return Redirect::route( 'home' );
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show( $id ) {
		$user = User::findOrFail( $id );

		if ( Auth::check() && Auth::getUser()->role == 'a' && Request::is( 'admin*' ) ) {
			return View::make( 'users.admin.show', compact( 'user' ) );
		} else {
			return View::make( 'users.show', compact( 'user' ) );
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$user = User::find( $id );

		return View::make( 'users.admin.edit', compact( 'user' ) );
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {
		$this->formUser->validate( Input::all() );

		$user = User::findOrFail( $id );

		$inputs = Input::all();

		if ( $inputs[ 'password' ] ) {
			$inputs[ 'password' ] = Hash::make( $inputs[ 'password' ] );
		} else {
			unset( $inputs[ 'password' ] );
		}
		unset( $inputs[ 'passwordConf' ] );

		$user->update( $inputs );

		return Redirect::route( 'admin.users.show', $id );
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy( $id ) {
		User::destroy( $id );

		return Redirect::route( 'admin.users.index' );

	}

}
