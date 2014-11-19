<?php namespace App\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class Content
 * @package App\Forms
 */
class Content extends FormValidator {
    /**
     * Validation rules for content
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'body' => 'required'
    ];

    /**
     * Error messages for content
     *
     * @var array
     */
    protected $messages = [
        'name.required' => 'Le titre est requis.',
        'body.required' => 'Le contenu est requis'
    ];
}
