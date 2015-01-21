<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class Post
 * @package App\Forms
 */
class Post extends FormValidator {
    /**
     * Validation rules for post
     *
     * @var array
     */
    protected $rules = [
        'name'        => 'required',
        'body'        => 'required',
    ];

    /**
     * Error messages for post
     *
     * @var array
     */
    protected $messages = [
        'name.required'        => 'Le nom est requis.',
        'body.required'        => 'La description est requise.',
    ];
}
