<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [ 'password', 'remember_token' ];

	protected $fillable = [ 'email', 'password', 'adress', 'postal_code', 'city', 'name', 'surname', 'phone', 'gsm' ];


	public function rallyes() {
		return $this->belongsToMany( 'Rallye' )->withPivot( 'gift_id' );
	}
}
