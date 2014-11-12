<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class Contact
 * @package App\Forms
 */
class Contact extends FormValidator {
    /**
     * Validation rules for contact
     *
     * @var array
     */
    protected $rules = [
        'name'    => 'required',
        'email'   => 'required|email',
        'subject' => 'required',
        'content' => 'required'
    ];

    /**
     * Error messages for contact
     *
     * @var array
     */
    protected $messages = [
        'name.required' => 'Le nom est requis.',
        'email.required' => 'L\'email est requis.',
        'email.email'   => 'L\'adresse email entrée est incorrecte.',
        'subject.required' => 'Le sujet du messsage est requis.',
        'content.required' => 'Le message est requis.',
    ];
}
