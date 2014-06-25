<?php namespace Prijs\Repository\User;

use Illuminate\Database\Eloquent\Model;


class EloquentUser implements UserInterface {

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	private $userModel;

	public function __construct(Model $userModel)
	{
		$this->userModel = $userModel;
	}

	/**
	 * Get single User, and associated Profile, by the Username
	 *
	 * @param string $username username of associated User
	 *
	 * @return object Object of User information
	 */
	public function byUsername($username)
	{
		return $this->userModel
			->with('Profile')
			->whereUsername($username)
			->first();
	}

}