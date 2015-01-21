<?php

class Post extends \Eloquent {

	// Don't forget to fill this array
	protected $fillable = [ 'name', 'body', 'slug', 'type_id' ];

    public function type () {
        return $this->belongsTo ( 'Type' );
    }
}
