<?php namespace Prijs\Service\Form\Registration;

use Prijs\Service\Validation\AbstractLaravelValidator;

class RegistrationValidator extends AbstractLaravelValidator {

	protected $rules = [
		'username' => 'required|unique:users',
		'email'    => 'required|email|unique:users',
		'password' => 'required|confirmed',
	];

}