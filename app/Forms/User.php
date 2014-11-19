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
        'login'       => 'required',
        'password'    => 'required',
        'email'       => 'required|email',
        'adress'      => 'required',
        'postal_code' => 'required|digits:4',
        'city'        => 'required',
    ];

    /**
     * Error messages for user
     *
     * @var array
     */
    protected $messages = [
        'login.required'       => 'Le login est requis.',
        'password.required'    => 'Le mot de passe est requis.',
        'email.required'       => 'L\'email est requis.',
        'email.email'          => 'Le format d\'email entré est incorrect.',
        'adress.required'      => 'L\'adresse est requise.',
        'postal_code.required' => 'Le code postal est requis.',
        'postal_code.digits'   => 'Le code postal doit être composé de 4 chiffres.',
        'city.required'        => 'La ville est requise.'
    ];
}
