<?php

class Event extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

    public function restaurants () {
        return $this->belongsToMany('Restaurant');
    }

    public function menus () {
        return $this->belongsToMany('Menu');
    }

    public function users () {
        return $this->belongsToMany('User');
    }
}
