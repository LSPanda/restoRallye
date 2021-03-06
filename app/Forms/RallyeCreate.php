<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class RallyeCreate
 * @package App\Forms
 */
class RallyeCreate extends FormValidator {
    /**
     * Validation rules for rallye creation
     *
     * @var array
     */
    protected $rules = [
        'body'        => 'required',
        'adress'      => 'required',
        'postal_code' => 'required|digits:4',
        'city'        => 'required',
        'date'        => 'date',
        'image'       => 'required|image|size:2048',
        'restaurants' => 'required'
    ];

    /**
     * Error messages for rallye creation
     *
     * @var array
     */
    protected $messages = [
        'body.required'        => 'La description est requise.',
        'adress.required'      => 'L\'adresse est requise.',
        'postal_code.required' => 'Le code postal est requis.',
        'postal_code.digits'   => 'Le code postal doit être composé de 4 chiffres.',
        'city.required'        => 'La ville est requise.',
        'date.date'            => 'La date entrée est incorrecte.',
        'image.required'       => 'Une image de couverture est requise.',
        'image.image'          => 'Le fichier envoyé n\'est pas une image.',
        'image.size'           => 'Le fichier fait plus de 2MB.',
        'restaurants.required' => 'Vous devez choisir au moins un restaurant.'
    ];
}
