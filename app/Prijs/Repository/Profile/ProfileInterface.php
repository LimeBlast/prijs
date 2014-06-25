<?php namespace Prijs\Repository\Profile;

interface ProfileInterface {

	/**
	 * Get single Profile by the Username
	 *
	 * @param string $username username of associated User
	 *
	 * @return object Object of Profile information
	 */
	public function byUsername($username);

}