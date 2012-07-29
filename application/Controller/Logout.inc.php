<?php

/**
 * /txt
 * Logout controller
 *
 * @package 
 * $Id: Default.inc.php 6 2009-08-26 11:11:40Z sam $
 */

class Controller_Logout extends Controller_BaseAbstract
{
	/**
	 * Default index action
	 * 
	 * @return void
	 */
	protected function indexAction()
	{		
		LSF_Session::GetSession()->destroySession();
		$this->redirect();
	}
}
