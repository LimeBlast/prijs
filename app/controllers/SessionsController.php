<?php

use Prijs\Forms\LoginForm;

class SessionsController extends \BaseController {

	/**
	 * @var Prijs\Forms\LoginForm
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
			return Redirect::intended('/');
		}

		return Redirect::back()->withInput()->withFlashMessage('Invalid credentials provided');
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