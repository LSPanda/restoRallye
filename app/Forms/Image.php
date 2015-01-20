<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class Image
 * @package App\Forms
 */
class Image extends FormValidator {
    /**
     * Validation rules for images
     *
     * @var array
     */
    protected $rules = [
        'images' => 'image|max:3000|required'
    ];

    /**
     * Error messages for images
     *
     * @var array
     */
    protected $messages = [
        'file.required' => 'Vous avez oubliez d\'entrer un fichier.',
        'file.image'    => 'Le fichier entré n\'est pas une image.',
        'file.max'      => 'Le fichier entré fait plus de 3M.',
    ];
}
