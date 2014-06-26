<?php

class SessionsController extends \BaseController {

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