<?php

class Profile extends Eloquent {

	protected $fillable = [
		'location',
		'bio'
	];

	public function user()
	{
		return $this->belongsTo('User');
	}

}