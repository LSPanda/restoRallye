<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class UserSigin
 * @package App\Forms
 */
class UserSignin extends FormValidator {
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
		'emailIns'     => 'required|email|unique:users,email',
		'passwordIns'  => 'required',
		'passwordConf' => 'required|same:passwordIns',
	];

	/**
	 * Error messages for user
	 *
	 * @var array
	 */
	protected $messages = [
		'name.required'         => 'Le nom est requis.',
		'surname.required'      => 'Le prénom est requis.',
		'adress.required'       => 'L\'adresse est requise.',
		'postal_code.required'  => 'Le code postal est requis.',
		'postal_code.digits'    => 'Le code postal doit être composé de 4 chiffres.',
		'city.required'         => 'La ville est requise.',
		'emailIns.required'     => 'L\'email est requis.',
		'emailIns.email'        => 'Le format d\'email entré est incorrect.',
		'emailIns.unique'       => 'L\'adresse email entrée est déjà présente dans la base de donnée.',
		'passwordIns.required'  => 'Le mot de passe est requis.',
		'passwordConf.required' => 'La confirmation de mot de passe est requise.',
		'passwordConf.same'     => 'Les deux mots de passes sont différents.',
	];
}
