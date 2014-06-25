<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prijs\Service\Form\ProfileValidator;

class ProfilesController extends \BaseController {

	/**
	 * @var Prijs\Service\Form\ProfileValidator
	 */
	private $profileValidator;

	public function __construct(ProfileValidator $profileValidator)
	{
		$this->profileValidator = $profileValidator;

		$this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
	}

	/**
	 * Display the specified resource.
	 * GET /{username}
	 *
	 * @param $username
	 * @return Response
	 */
	public function show($username)
	{
		try {
			$user = User::with('Profile')->whereUsername($username)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			App::abort(404);
		}

		return View::make('profiles.show')->withUser($user);
	}

	/**
	 * Display the specified resource.
	 * GET /{username}
	 *
	 * @param $username
	 * @return Response
	 */
	public function edit($username)
	{
		try {
			$user = User::with('Profile')->whereUsername($username)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			App::abort(404);
		}

		return View::make('profiles.edit')->withUser($user);
	}

	public function update($username)
	{
		try {
			$user = User::with('Profile')->whereUsername($username)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			App::abort(404);
		}

		$input = Input::only('location', 'bio');

		$this->profileValidator->validate($input);

		$user->profile->fill($input)->save();

		Notification::success('Profile updated');
		return Redirect::route('profiles.edit', [$user->username]);
	}

}