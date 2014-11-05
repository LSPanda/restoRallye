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
        'login'    => 'required',
        'password' => 'required'
    ];

    /**
     * Error messages for login
     *
     * @var array
     */
    protected $messages = [
        'login.required'    => 'Le login est requis.',
        'password.required' => 'Le mot de passe est requis.'
    ];
}
