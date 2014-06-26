<?php namespace Prijs\Repository\User;

use Illuminate\Database\Eloquent\Model;

class EloquentUser implements UserInterface {

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	private $userModel;
	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	private $profileModel;

	public function __construct(Model $userModel, Model $profileModel)
	{
		$this->userModel = $userModel;
		$this->profileModel = $profileModel;
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

	/**
	 * Create a new User and associated Profile
	 *
	 * @param array $data Data to create a new record
	 *
	 * @return boolean
	 */
	public function create(array $data)
	{
		// Create the user
		$user = $this->userModel->create([
			'username' => $data['username'],
			'email'    => $data['email'],
			'password' => $data['password']
		]);

		// Create the profile
		$profile = $this->profileModel->create([
			'location' => $data['profile']['location'],
			'bio'      => $data['profile']['bio']
		]);

		$user->profile()->save($profile);
		$user->save();

		return true;
	}

	/**
	 * Update an existing User and associated Profile
	 *
	 * @param array $data Data to update a record
	 *
	 * @return boolean
	 */
	public function update(array $data)
	{
		// TODO: Implement update() method.
	}
}