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
        'email'       => 'required|email|exists:users,email',
        'postal_code' => 'digits:4',
    ];

    /**
     * Error messages for user
     *
     * @var array
     */
    protected $messages = [
        'email.required'       => 'L\'email est requis.',
        'email.email'          => 'Le format d\'email entré est incorrect.',
        'email.exists'         => 'L\'adresse email entrée est déjà présente dans la base de donnée.',
        'postal_code.digits'   => 'Le code postal doit être composé de 4 chiffres.',
    ];
}
