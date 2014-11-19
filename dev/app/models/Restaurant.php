<?php

class Restaurant extends \Eloquent {

    protected $fillable = [ 'name', 'slug', 'body', 'adress', 'postal_code', 'city', 'email', 'website' ];

    public function rallyes () {
        return $this->belongsToMany ( 'Rallye' )->withPivot ( 'menu_id' );
    }
}
