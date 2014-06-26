<?php

use Prijs\Repository\User\UserInterface;
use Prijs\Service\Form\Registration\RegistrationForm;
use Prijs\Service\Form\Registration\RegistrationValidator;

class RegistrationController extends \BaseController {

	/**
	 * @var Prijs\Service\Form\RegistrationValidator
	 */
	private $registrationValidator;

	/**
	 * @var Prijs\Repository\User\UserInterface
	 */
	private $user;
	/**
	 * @var Prijs\Service\Form\Registration\RegistrationForm
	 */
	private $registrationForm;

	/**
	 * @param UserInterface         $user
	 * @param RegistrationValidator $registrationValidator
	 * @param RegistrationForm      $registrationForm
	 */
	public function __construct(UserInterface $user, RegistrationValidator $registrationValidator, RegistrationForm $registrationForm)
	{
		$this->user                  = $user;
		$this->registrationValidator = $registrationValidator;
		$this->registrationForm      = $registrationForm;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 * GET /register
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /registration
	 * POST /register
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if ($this->registrationForm->save($input)) {
			return Redirect::home();
		} else {
			return Redirect::back()
				->withInput()
				->withErrors($this->registrationForm->errors())
				->with('status', 'error');
		}
	}

}