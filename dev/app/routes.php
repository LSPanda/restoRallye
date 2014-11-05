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

Route::group ( [ 'before' => 'auth', 'prefix' => $_ENV[ 'PREFIX' ] ],
    function ()
    {
        Route::resource ( 'restaurants',
            'RestaurantsController',
            [ 'except' => [ 'index', 'show' ] ] );

        Route::resource ( 'rallyes',
            'RallyesController',
            [ 'except' => [ 'index', 'show' ] ] );

        Route::resource ( 'menus', 'MenusController' );

        Route::resource ( 'posts',
            'PostsController',
            [ 'except' => [ 'index', 'show' ] ] );

        Route::resource ( 'comments',
            'CommentsController',
            [ 'except' => [ 'create' ] ] );

        Route::resource ( 'types', 'TypesController' );
    }
);

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/restaurants',
    [
        'before' => 'auth',
        'as'     => 'restaurantAdminIndex',
        'uses'   => 'RestaurantsController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/restaurants/show/{id}',
    [
        'before' => 'auth',
        'as'     => 'restaurantAdminShow',
        'uses'   => 'RestaurantsController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/menus',
    [
        'before' => 'auth',
        'as'     => 'menuAdminIndex',
        'uses'   => 'MenusController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/menus/show/{id}',
    [
        'before' => 'auth',
        'as'     => 'menuAdminShow',
        'uses'   => 'MenusController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/posts',
    [
        'before' => 'auth',
        'as'     => 'postAdminIndex',
        'uses'   => 'PostsController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/posts/show/{id}',
    [
        'before' => 'auth',
        'as'     => 'postAdminShow',
        'uses'   => 'PostsController@adminShow'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/rallyes',
    [
        'before' => 'auth',
        'as'     => 'rallyeAdminIndex',
        'uses'   => 'RallyesController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/rallyes/show/{id}',
    [
        'before' => 'auth',
        'as'     => 'rallyeAdminShow',
        'uses'   => 'RallyesController@adminShow'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/users',
    [
        'before' => 'auth',
        'as'     => 'userAdminIndex',
        'uses'   => 'UsersController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/users/show/{id}',
    [
        'before' => 'auth',
        'as'     => 'userAdminShow',
        'uses'   => 'UsersController@adminShow'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ] . '/contents',
    [
        'before' => 'auth',
        'as'     => 'pageAdminList',
        'uses'   => 'PagesController@adminList'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ],
    [
        'before' => 'auth',
        'as'     => 'adminIndex',
        'uses'   => 'PagesController@adminIndex'
    ] );
