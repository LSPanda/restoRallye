<?php
use App\Forms\Home as FormHome;
class PagesController extends \BaseController {

    protected $formHome;

    public function __construct (FormHome $formHome) {
        $this->formHome = $formHome;
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
}
