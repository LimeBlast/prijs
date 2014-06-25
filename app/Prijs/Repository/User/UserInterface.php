<?php namespace Prijs\Repository\User;

interface UserInterface {

	/**
	 * Get single User, and associated Profile, by the Username
	 *
	 * @param string $username username of associated User
	 *
	 * @return object Object of User information
	 */
	public function byUsername($username);

	/**
	 * Create a new User and associated Profile
	 *
	 * @param array $data Data to create a new record
	 *
	 * @return boolean
	 */
	public function create(array $data);


	/**
	 * Update an existing User and associated Profile
	 *
	 * @param array $data Data to update a record
	 *
	 * @return boolean
	 */
	public function update(array $data);

}