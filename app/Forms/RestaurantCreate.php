<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class RestaurantCreate
 * @package App\Forms
 */
class RestaurantCreate extends FormValidator {
    /**
     * Validation rules for restaurant creation
     *
     * @var array
     */
    protected $rules = [
        'name'        => 'required',
        'body'        => 'required',
        'adress'      => 'required',
        'postal_code' => 'required|digits:4',
        'city'        => 'required',
        'email'       => 'email',
        'website'     => 'url|active_url',
        'tel'         => [ 'regex:/^(((\+|00)32\s?|0)(\d\s?\d{3}|\d{2}\s?\d{2})(\s?\d{2}){2})|((\+|00)32\s?|0)4(60|[789]\d)(\s?\d{2}){3}$/' ],
	    'image'       => 'required|image|size:2048'
    ];

    /**
     * Error messages for restaurant creation
     *
     * @var array
     */
    protected $messages = [
        'name.required'        => 'Le nom est requis.',
        'body.required'        => 'La description est requise.',
        'adress.required'      => 'L\'adresse est requise.',
        'postal_code.required' => 'Le code postal est requis.',
        'postal_code.digits'   => 'Le code postal doit être composé de 4 chiffres.',
        'city.required'        => 'La ville est requise.',
        'email.email'          => 'Le format d\'email entré est incorrect.',
        'website.url'          => 'L\'url entrée est incorrecte.',
        'website.active_url'   => 'Le site entré n\'est pas ou plus actif.',
        'tel.regex'            => 'Le format du numéro de téléphone est incorrect.',
        'image.required'       => 'Une image de couverture est requise.',
        'image.image'          => 'Le fichier envoyé n\'est pas une image.',
        'image.size'           => 'Le fichier fait plus de 2MB.',
    ];
}
