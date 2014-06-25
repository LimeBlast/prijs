<?php namespace Prijs\Service\Form;

use Laracasts\Validation\FormValidator;

class RegistrationValidator extends FormValidator {

	protected $rules = [
		'username' => 'required|unique:users',
		'email'    => 'required|email|unique:users',
		'password' => 'required|confirmed',
	];

}