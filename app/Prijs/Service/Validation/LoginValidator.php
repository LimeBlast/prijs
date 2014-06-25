<?php namespace Prijs\Service\Validation;

use Laracasts\Validation\FormValidator;

class LoginValidator extends FormValidator {

	protected $rules = [
		'email'    => 'required|email',
		'password' => 'required',
	];

}