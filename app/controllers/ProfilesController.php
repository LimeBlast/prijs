<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prijs\Repository\Profile\ProfileInterface;
use Prijs\Service\Form\ProfileValidator;

class ProfilesController extends \BaseController {

	/**
	 * @var Prijs\Service\Form\ProfileValidator
	 */
	private $profileValidator;
	/**
	 * @var Prijs\Repository\Profile\ProfileInterface
	 */
	private $profile;

	public function __construct(ProfileInterface $profile, ProfileValidator $profileValidator)
	{
		$this->profile = $profile;
		$this->profileValidator = $profileValidator;
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
		$user = $this->profile->byUsername($username);

		if (!$user) {
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
		$user = $this->profile->byUsername($username);

		if (!$user) {
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