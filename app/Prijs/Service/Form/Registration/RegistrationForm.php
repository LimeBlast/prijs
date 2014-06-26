<?php namespace Prijs\Service\Form\Registration;

use Prijs\Repository\User\UserInterface;
use Prijs\Service\Validation\ValidationInterface;

class RegistrationForm {

	/**
	 * @var \Laracasts\Validation\FormValidator
	 */
	private $validator;
	/**
	 * @var \Prijs\Repository\User\UserInterface
	 */
	private $user;

	/**
	 * @param ValidationInterface $validator
	 * @param UserInterface       $user
	 */
	public function __construct(ValidationInterface $validator, UserInterface $user)
	{
		$this->validator = $validator;
		$this->user = $user;
	}

	public function save(array $input)
	{
		if (!$this->valid($input)) {
			return false;
		}

		return $this->user->create($input);
	}

	/**
	 * Return any validation errors
	 *
	 * @return array
	 */
	public function errors()
	{
		return $this->validator->errors();
	}

	/**
	 * Test if validator passes
	 *
	 * @param array $input
	 *
	 * @return mixed
	 */
	protected function valid(array $input)
	{
		return $this->validator->with($input)->passes();
	}
}