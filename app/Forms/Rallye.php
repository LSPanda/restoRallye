<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class Rallye
 * @package App\Forms
 */
class Rallye extends FormValidator {
    /**
     * Validation rules for rallye
     *
     * @var array
     */
    protected $rules = [
        'body'        => 'required',
        'adress'      => 'required',
        'postal_code' => 'required|digits:4',
        'city'        => 'required',
        'date'        => 'date'
    ];

    /**
     * Error messages for rallye
     *
     * @var array
     */
    protected $messages = [
        'body.required'        => 'La description est requise.',
        'adress.required'      => 'L\'adresse est requise.',
        'postal_code.required' => 'Le code postal est requis.',
        'postal_code.digits'   => 'Le code postal doit être composé de 4 chiffres.',
        'city.required'        => 'La ville est requise.',
        'date.date'            => 'La date entrée est incorrecte.'
    ];
}
