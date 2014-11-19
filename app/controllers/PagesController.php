<?php
use App\Forms\Home as FormHome;
use App\Forms\Contact as FormContact;
use App\Forms\Content as FormContent;

class PagesController extends \BaseController {

    protected $formHome, $formContact, $formContent;

    public function __construct (FormHome $formHome, FormContact $formContact, FormContent $formContent) {
        $this->formHome    = $formHome;
        $this->formContact = $formContact;
        $this->formContent = $formContent;
    }

    public function home () {
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        $restaurants = Restaurant::all ()->random ( 3 );

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
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        return View::make ( 'pages.admin.contents', compact ( 'about' ) );
    }

    /**
     * Update the specified content in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function updateContent ($id) {
        $this->formContent->validate ( Input::all () );

        $content = Post::findOrFail ( $id );

        $content->update ( Input::all () );

        return Redirect::route ( 'admin.pages.index' );
    }

    public function contact () {
        return View::make ( 'pages.contact' );
    }

    public function sendMail () {
        $this->formContact->validate ( Input::all () );

        return Redirect::route ( 'pages.contact' );
    }
}
