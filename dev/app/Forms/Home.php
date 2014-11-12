<?php namespace App\Forms;
use Laracasts\Validation\FormValidator;

/**
 * Class Home
 * @package App\Forms
 */
class Home extends FormValidator {
    /**
     * Validation rules for home
     *
     * @var array
     */
    protected $rules = [
        'email'    => 'email|unique:newsletter_emails'
    ];

    /**
     * Error messages for home
     *
     * @var array
     */
    protected $messages = [
        'email.email'    => 'L\'adresse email entrée est incorrecte.',
        'email.unique'    => 'L\'adresse email entrée existe déjà dans la base de donnée.',
    ];
}
