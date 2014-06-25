<?php

use Prijs\Service\Form\LoginForm;

class SessionsController extends \BaseController {

	/**
	 * @var Prijs\Service\Form\LoginForm
	 */
	private $loginForm;

	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 * GET /login
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 * POST /login
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');

		$this->loginForm->validate($input);

		if (Auth::attempt($input)) {
			Notification::success("Successfully signed in.");
			return Redirect::intended('/');
		}

		Notification::info("Invalid credentials provided");
		return Redirect::back()->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions
	 * GET /logout
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home();
	}

}