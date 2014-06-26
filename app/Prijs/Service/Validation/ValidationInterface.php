<?php namespace Prijs\Service\Validation;

interface ValidationInterface {

	/**
	 * Add data to validation against
	 *
	 * @param array
	 *
	 * @return \Prijs\Service\Validation\ValidationInterface  $this
	 */
	public function with(array $input);

	/**
	 * Test if validation passes
	 *
	 * @return boolean
	 */
	public function passes();

	/**
	 * Retrieve validation errors
	 *
	 * @return array
	 */
	public function errors();

}