<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	const ROLE_SYSTEM = 1; // system admin
	const ROLE_REPERTORY = 2; // rept admin
	const ROLE_SHOP = 3; // shop admin

	public static $apply_status = array(
		'applying'     => 1,
		'applied'      => 2,
		'apply_failed' => 3
	);
	public function __construct()
	{
	}
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
