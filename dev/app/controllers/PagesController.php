<?php

class PagesController extends \BaseController {

    public function home () {
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        return View::make ( 'pages.home', compact ( 'about' ) );
    }

    public function adminIndex () {
        return View::make ( 'pages.adminIndex' );
    }

    public function contact () {
        return View::make ( 'pages.contact' );
    }
}
