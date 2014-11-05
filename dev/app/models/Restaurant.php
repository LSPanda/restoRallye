<?php

class Restaurant extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [ ];

    public function rallyes () {
        return $this->belongsToMany ( 'Rallye' )->withPivot ( 'menu_id' );
    }
}
