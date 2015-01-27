<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class PostCreate
 * @package App\Forms
 */
class PostCreate extends FormValidator {
    /**
     * Validation rules for post creation
     *
     * @var array
     */
    protected $rules = [
        'name'        => 'required',
        'body'        => 'required',
	    'image'       => 'required|image'
    ];

    /**
     * Error messages for post creation
     *
     * @var array
     */
    protected $messages = [
        'name.required'        => 'Le nom est requis.',
        'body.required'        => 'La description est requise.',
        'image.required'       => 'Une image de couverture est requise.',
        'image.image'          => 'Le fichier envoyé n\'est pas une image.',
    ];
}
