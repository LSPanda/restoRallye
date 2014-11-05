<?php

class Rallye extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [ ];

    public function restaurants () {
        return $this->belongsToMany ( 'Restaurant' )->withPivot ( 'menu_id' );
    }

    public function users () {
        return $this->belongsToMany ( 'User' );
    }
}
