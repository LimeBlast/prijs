<?php namespace Prijs\Repository;

use Illuminate\Support\ServiceProvider;
use Prijs\Repository\Profile\EloquentProfile;
use User;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Prijs\Repository\Profile\ProfileInterface', function () {
			return new EloquentProfile(
				new User
			);
		});
	}
}