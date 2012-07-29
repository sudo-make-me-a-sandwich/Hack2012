<?php

/**
 * Abstract auth controller
 *
 * @package
 */

abstract class Controller_BaseAbstract extends LSF_Controller
{
	/**
	 * (non-PHPdoc)
	 * @see framework/LSF_Controller::start()
	 */
	public function start()
	{
		$return = parent::start();
		
		$this->view->txtNumber = LSF_Config::get('txt_number');
		
		return $return;
	}
}
