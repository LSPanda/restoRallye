<?php

class Post extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'body', 'slug'];

    public function type () {
        return $this->belongsTo ( 'Type' );
    }
}
