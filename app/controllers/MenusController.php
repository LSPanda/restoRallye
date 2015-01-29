<?php

class MenusController extends \BaseController {

	/**
	 * Display a listing of menus
	 *
	 * @return Response
	 */
	public function index() {
		$menus = $this->getAllMenus();

		return View::make( 'menus.admin.index', compact( 'menus' ) );
	}

	/**
	 * Show the form for creating a new menus
	 *
	 * @return Response
	 */
	public function create() {
		return View::make( 'menus.admin.create' );
	}

	/**
	 * Store a newly created menus in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$inputs = Input::all();
		array_shift( $inputs );
		$errors = [ ];
		$menus  = [ ];
		$limit  = count( $inputs ) / 2;
		for ( $i = 0; $i < $limit; $i ++ ) {
			$is[ ] = $i;
			if ( $inputs[ 'serviceName-' . $i ] != '' ) {
				$menus[ $i ][ 'name' ] = $inputs[ 'serviceName-' . $i ];
				foreach ( $inputs[ 'mealName-' . $i ] as $menu ) {
					if ( $menu != '' ) {
						$menus[ $i ][ 'content' ][ ] = $menu;
					}
				}
			} else {
				$inputs[ 'mealName-' . $i ] = array_filter( $inputs[ 'mealName-' . $i ] );
				if ( $inputs[ 'mealName-' . $i ] ) {
					$errors[ ] = [ 'serviceName' => 'Le nom de service est obligatoire.' ];
				} else {
					unset( $inputs[ 'mealName-' . $i ], $inputs[ 'serviceName-' . $i ] );
				}
			}
		}

		if ( ! $errors ) {
			Menu::create( [
				'body' => Response::json( $menus )
			] );

			return Redirect::route( 'admin.menus.index' );

		} else {
			return Redirect::back()->with( 'input', $inputs )->withErrors( $errors );
		}
	}

	/**
	 * Display the specified menus.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show( $id ) {
		$menus = Menu::findOrFail( $id );

		return View::make( 'menus.admin.show', compact( 'menus' ) );
	}

	/**
	 * Show the form for editing the specified menus.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$menus    = $this->getMenu( $id );
		$menuJson = [ ];
		for ( $i = 0; $i < count( $menus ); $i ++ ) {
			$menuJson [ 'serviceName-' . $i ] = $menus[ $i ]->name;
			$menuJson [ 'mealName-' . $i ]    = $menus[ $i ]->content;
		}

		return View::make( 'menus.admin.edit', compact( 'menuJson', 'id' ) );
	}

	/**
	 * Update the specified menus in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {
		$inputs = Input::all();
		array_shift( $inputs );
		array_shift( $inputs );
		$errors = [ ];
		$menus  = [ ];
		$limit  = count( $inputs ) / 2;
		for ( $i = 0; $i < $limit; $i ++ ) {
			$is[ ] = $i;
			if ( $inputs[ 'serviceName-' . $i ] != '' ) {
				$menus[ $i ][ 'name' ] = $inputs[ 'serviceName-' . $i ];
				foreach ( $inputs[ 'mealName-' . $i ] as $menu ) {
					if ( $menu != '' ) {
						$menus[ $i ][ 'content' ][ ] = $menu;
					}
				}
			} else {
				$inputs[ 'mealName-' . $i ] = array_filter( $inputs[ 'mealName-' . $i ] );
				if ( $inputs[ 'mealName-' . $i ] ) {
					$errors[ ] = [ 'serviceName' => 'Le nom de service est obligatoire.' ];
				} else {
					unset( $inputs[ 'mealName-' . $i ], $inputs[ 'serviceName-' . $i ] );
				}
			}
		}

		if ( ! $errors ) {
			$menu = Menu::find ( $id );

			$menu->body = Response::json( $menus );

			$menu->save();

			return Redirect::route( 'admin.menus.index' );

		} else {
			return Redirect::back()->with( 'input', $inputs )->withErrors( $errors );
		}
	}

	/**
	 * Remove the specified menus from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy( $id ) {
		Menu::destroy( $id );

		return Redirect::route( 'admin.menus.index' );
	}

	/**
	 * Get the menu in json for the id given
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function getMenu( $id ) {
		$menu = Menu::find( $id );
		$menu = explode( '[', $menu->body, 2 );

		return json_decode( '[' . $menu[ 1 ] );
	}


	/**
	 * Get all the menus in json
	 *
	 * @return array
	 */
	public function getAllMenus() {
		$menus = Menu::all();
		for ( $i = 0, $jsonMenus = [ ]; $i < count( $menus ); $i ++ ) {
			$strMenu                   = explode( '[', $menus [ $i ]->body, 2 );
			$jsonMenus[ $i ][ 'menu' ] = json_decode( '[' . $strMenu[ 1 ] );
			$jsonMenus[ $i ][ 'id' ]   = $menus[ $i ]->id;
		}

		return $jsonMenus;
	}

}
