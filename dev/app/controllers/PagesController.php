<?php

class PagesController extends \BaseController {

    public function home () {
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        return View::make ( 'pages.home', compact ( 'about' ) );
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
