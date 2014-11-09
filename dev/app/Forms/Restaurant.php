<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class Restaurant
 * @package App\Forms
 */
class Restaurant extends FormValidator {
    /**
     * Validation rules for restaurant
     *
     * @var array
     */
    protected $rules = [
        'name'        => 'required',
        'body'        => 'required',
        'adress'      => 'required',
        'postal_code' => 'required',
        'city'        => 'required',
        'email'       => 'email',
        'website'     => 'url|active_url',
        'tel'         => [ 'regex:/^(((\+|00)32\s?|0)(\d\s?\d{3}|\d{2}\s?\d{2})(\s?\d{2}){2})|((\+|00)32\s?|0)4(60|[789]\d)(\s?\d{2}){3}$/' ]
    ];

    /**
     * Error messages for login
     *
     * @var array
     */
    protected $messages = [
        'name.required'        => 'Le nom est requis.',
        'body.required'        => 'La description est requise.',
        'adress.required'      => 'L\'adresse est requise.',
        'postal_code.required' => 'Le code postal est requis.',
        'city.required'        => 'La ville est requise.',
        'email.email'          => 'Le format d\'email entré est incorrect.',
        'website.url'          => 'L\'url entrée est incorrecte.',
        'website.active_url'   => 'Le site entré n\'est pas ou plus actif.',
        'tel.regex'            => 'Le format du numéro de téléphone est incorrect.'
    ];
}
