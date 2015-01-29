<?php namespace App\Forms;
use Laracasts\Validation\FormValidator;

/**
 * Class Login
 * @package App\Forms
 */
class Login extends FormValidator {
    /**
     * Validation rules for login
     *
     * @var array
     */
    protected $rules = [
        'email'    => 'required|email|exists:users,email',
        'password' => 'required'
    ];

    /**
     * Error messages for login
     *
     * @var array
     */
    protected $messages = [
        'email.required'    => 'L\'adresse email est requise.',
        'email.email'    => 'L\'adresse email entrée est incorrecte.',
        'email.exists'    => 'L\'adresse email n\'est pas dans notre base de donnée.',
        'password.required' => 'Le mot de passe est requis.'
    ];
}
