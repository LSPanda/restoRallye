<?php

class Rallye extends \Eloquent {

    // Don't forget to fill this array
    protected $fillable = [ 'body', 'date', 'adress', 'postal_code', 'city' ];

    public function restaurants () {
        return $this->belongsToMany ( 'Restaurant' )->withPivot ( 'menu_id' );
    }

    public function users () {
        return $this->belongsToMany ( 'User' )->withPivot('gift_id');
    }
}
