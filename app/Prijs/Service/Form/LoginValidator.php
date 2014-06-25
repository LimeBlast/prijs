<?php namespace Prijs\Service\Form;

use Laracasts\Validation\FormValidator;

class LoginValidator extends FormValidator {

	protected $rules = [
		'email'    => 'required|email',
		'password' => 'required',
	];

}