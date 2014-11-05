<?php

class PagesController extends \BaseController {

    public function home (){
        return View::make('hello');
    }

    public function contact (){
        return View::make('contact');
    }
}
