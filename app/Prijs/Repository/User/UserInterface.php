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

}