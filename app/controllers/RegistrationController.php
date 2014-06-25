<?php

use Prijs\Service\Validation\RegistrationValidator;

class RegistrationController extends \BaseController {

	/**
	 * @var Prijs\Service\Validation\RegistrationValidator
	 */
	private $registrationValidator;

	function __construct(RegistrationValidator $registrationValidator)
	{
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
		$input = Input::only('username', 'email', 'password', 'password_confirmation');

		$this->registrationValidator->validate($input);

		$user = User::create($input);

		Auth::login($user);

		return Redirect::home();
	}

}