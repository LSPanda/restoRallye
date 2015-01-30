<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class User
 * @package App\Forms
 */
class User extends FormValidator {
	/**
	 * Validation rules for user
	 *
	 * @var array
	 */
	protected $rules = [
		'name'         => 'required',
		'surname'      => 'required',
		'adress'       => 'required',
		'postal_code'  => 'required|digits:4',
		'city'         => 'required',
		'email'        => 'required|email',
		'password'     => 'required_with:passwordConf',
		'passwordConf' => 'same:password|required_with:password',
	];

	/**
	 * Error messages for user
	 *
	 * @var array
	 */
	protected $messages = [
		'name.required'              => 'Le nom est requis.',
		'surname.required'           => 'Le prénom est requis.',
		'adress.required'            => 'L\'adresse est requise.',
		'postal_code.required'       => 'Le code postal est requis.',
		'postal_code.digits'         => 'Le code postal doit être composé de 4 chiffres.',
		'city.required'              => 'La ville est requise.',
		'email.required'             => 'L\'email est requis.',
		'email.email'                => 'Le format d\'email entré est incorrect.',
		'password.required_with'     => 'Il faut entrer le premier mot de passe.',
		'passwordConf.same'          => 'Les deux mots de passes sont différents.',
		'passwordConf.required_with' => 'Il faut entrer les deux mots de passe.',
	];
}
