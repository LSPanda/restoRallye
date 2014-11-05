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

        Route::resource ( 'menus',
            'MenusController',
            [ 'except' => [ 'index', 'show' ] ] );

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
        'as'     => 'restaurantAdminIndex',
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
        'as'     => 'menuAdminIndex',
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
        'as'     => 'postAdminIndex',
        'uses'   => 'PostsController@adminIndex'
    ] );

Route::get ( '/' . $_ENV[ 'PREFIX' ],
    [
        'before' => 'auth',
        'as'     => 'adminIndex',
        'uses'   => 'PagesController@adminIndex'
    ] );
