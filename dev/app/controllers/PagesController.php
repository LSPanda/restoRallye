<?php
use App\Forms\Home as FormHome;
use App\Forms\Contact as FormContact;
class PagesController extends \BaseController {

    protected $formHome, $formContact;

    public function __construct (FormHome $formHome, FormContact $formContact) {
        $this->formHome = $formHome;
        $this->formContact = $formContact;
    }

    public function home () {
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        $restaurants = Restaurant::all()->random(3);

        return View::make ( 'pages.home', compact ( 'about', 'restaurants' ) );
    }

    public function storeEmailNewsletter () {
        $this->formHome->validate ( Input::all () );

        NewsletterEmail::create ( Input::all () );

        return Redirect::route ( 'home' );
    }

    public function homeAdmin () {
        return View::make ( 'pages.admin.index', compact ( 'about' ) );
    }

    public function contents () {
        return View::make ( 'pages.admin.contents' );
    }

    public function contact () {
        return View::make ( 'pages.contact' );
    }

    public function sendMail (){
        $this->formContact->validate(Input::all());

        return Redirect::route ( 'pages.contact' );
    }
}
