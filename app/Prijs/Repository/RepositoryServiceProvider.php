<?php namespace Prijs\Repository;

use Illuminate\Support\ServiceProvider;
use Prijs\Repository\User\EloquentUser;
use User;
use Profile;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Prijs\Repository\User\UserInterface', function () {
			return new EloquentUser(
				new User,
				new Profile
			);
		});
	}
}