<?php
use App\Forms\Login as LoginForm;

class AuthController extends \BaseController {

    protected $loginForm;

    public function __construct (LoginForm $loginForm) {
        $this->loginForm = $loginForm;
    }

    public function login () {
        return View::make ( 'auth.login' );
    }

    public function doLogin () {
        $this->loginForm->validate ( Input::all () );

        if (Auth::attempt ( Input::only ( 'login', 'password' ) ))
        {
            return Redirect::intended ( 'pages.adminIndex' );
        }
        else
        {
            return Redirect::back ()->withInput ()->withMessage ( 'Mauvais identifiants' );
        }
    }

    public function logout () {
        Auth::logout ();

        return Redirect::home ();
    }


}
