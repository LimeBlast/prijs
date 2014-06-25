<?php namespace Prijs\Repository\Profile;

use Illuminate\Database\Eloquent\Model;

class EloquentProfile implements ProfileInterface {

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	private $user;

	public function __construct(Model $user)
	{
		$this->user = $user;
	}

	/**
	 * Get single Profile by the Username
	 *
	 * @param string $username username of associated User
	 *
	 * @return object Object of Profile information
	 */
	public function byUsername($username)
	{
		return $this->user
			->with('Profile')
			->whereUsername($username)
			->first();
	}

}