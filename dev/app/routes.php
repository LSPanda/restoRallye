<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Patterns
 */

Route::pattern ( 'id', '[0-9]+' );
Route::pattern ( 'slug', '[a-z0-9-]+' );

/**
 * Pages routes
 */

Route::get ( '/',
    [
        'as'   => 'home',
        'uses' => 'PagesController@home'
    ] );

Route::post ( '/storeEmailNewsletter',
    [
        'as'   => 'storeEmailNewsletter',
        'uses' => 'PagesController@storeEmailNewsletter'
    ] );

Route::get ( '/contact',
    [
        'as'   => 'contact',
        'uses' => 'PagesController@contact'
    ] );

Route::post ( '/sendMail',
    [
        'as'   => 'sendMail',
        'uses' => 'PagesController@sendMail'
    ] );

/**
 * Front end routes
 */

Route::resource ( 'restaurants',
    'RestaurantsController',
    [ 'only' => [ 'index', 'show' ] ] );

Route::resource ( 'rallyes',
    'RallyesController',
    [ 'only' => [ 'index', 'show' ] ] );

Route::resource ( 'menus',
    'MenusController',
    [ 'only' => [ 'index', 'show' ] ] );

Route::resource ( 'posts',
    'PostsController',
    [ 'only' => [ 'index', 'show' ] ] );

/**
 * Login routes
 */

Route::get ( '/login',
    [
        'as'   => 'login',
        'uses' => 'AuthController@login'
    ] );

Route::post ( '/doLogin',
    [
        'as'   => 'doLogin',
        'uses' => 'AuthController@doLogin'
    ] );

Route::get ( '/logout',
    [
        'as'   => 'logout',
        'uses' => 'AuthController@logout'
    ] );

/**
 * Back End routes
 */

Route::get ( '/' . $_ENV[ 'PREFIX' ],
    [
        'before' => 'auth',
        'as'     => 'admin.home',
        'uses'   => 'PagesController@homeAdmin'
    ] );

Route::group ( [ 'before' => 'auth', 'prefix' => $_ENV[ 'PREFIX' ] ],
    function ()
    {
        Route::resource ( 'restaurants', 'RestaurantsController' );

        Route::resource ( 'rallyes', 'RallyesController' );

        Route::resource ( 'menus', 'MenusController' );

        Route::resource ( 'posts', 'PostsController' );

        Route::resource ( 'comments', 'CommentsController' );

        Route::resource ( 'types', 'TypesController' );

        Route::resource ( 'users', 'UsersController' );
    }
);

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/contents',
    [
        'before' => 'auth',
        'as'     => 'admin.pages.index',
        'uses'   => 'PagesController@contents'
    ] );

Route::put ( '/' . $_ENV[ 'PREFIX' ] . '/contents/{posts}',
    [
        'before' => 'auth',
        'as'     => 'admin.contents.update',
        'uses'   => 'PagesController@updateContent'
    ] );
