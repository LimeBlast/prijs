<?php

use Prijs\Repository\User\UserInterface;
use Prijs\Service\Form\RegistrationValidator;

class RegistrationController extends \BaseController {

	/**
	 * @var Prijs\Service\Form\RegistrationValidator
	 */
	private $registrationValidator;

	/**
	 * @var Prijs\Repository\User\UserInterface
	 */
	private $User;

	public function __construct(UserInterface $User, RegistrationValidator $registrationValidator)
	{
		$this->User = $User;
		$this->registrationValidator = $registrationValidator;
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

		$this->registrationValidator->validate($input);

		$this->User->create($input);

		return Redirect::home();
	}

}