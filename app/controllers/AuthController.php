<?php
use App\Forms\Login as LoginForm;

class AuthController extends \BaseController {

	protected $loginForm;

	public function __construct( LoginForm $loginForm ) {
		$this->loginForm = $loginForm;
	}

	public function login() {
		return View::make( 'auth.login' );
	}

	public function doLogin() {
		$this->loginForm->validate( Input::all() );

		if ( Auth::attempt( Input::only( 'email', 'password' ) ) ) {
			$user = User::whereEmail( Input::only( 'email' ) )->first();

			if ( $user->role == 'a' ) {
				return Redirect::intended( $_ENV[ 'PREFIX' ] );
			} else {
				return Redirect::intended();
			}

		} else {
			return Redirect::back()->withInput()->withMessage( 'Mauvais identifiants' );
		}
	}


	public function logout() {
		Auth::logout();

		return Redirect::home();
	}


}
