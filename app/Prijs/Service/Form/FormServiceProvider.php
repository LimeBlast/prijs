<?php namespace Prijs\Service\Form;

use Illuminate\Support\ServiceProvider;
use Prijs\Service\Form\Registration\RegistrationForm;
use Prijs\Service\Form\Registration\RegistrationValidator;

class FormServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;

		$app->bind(
			'Prijs\Service\Form\Registration\RegistrationForm', function ($app) {
				return new RegistrationForm(
					new RegistrationValidator($app['validator']),
					$app->make('Prijs\Repository\User\UserInterface')
				);
			}
		);
	}
}