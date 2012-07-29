<?php

/**
 * /txt
 * Incoming controller
 *
 * @package 
 * $Id: Default.inc.php 6 2009-08-26 11:11:40Z sam $
 */

class Controller_Incoming extends LSF_Controller
{
	/**
	 * Default index action
	 * 
	 * @return void
	 */
	protected function indexAction()
	{
		$this->setPresenterName('none');
		
		$from = $this->getRequest()->getGetVar('from');
		$text = $this->getRequest()->getGetVar('content');
		
		if (substr($from, 0, 2) == 44) {
			$from = '0' . substr($from, 2);
		}
		
		if (!empty($from) && !empty($text))
		{
			$incoming = new Model_Text_Incoming();
			$incoming->setText($text);
			$incoming->setFrom(Model_User::Get($from));
			$incoming->process();
		}
	}
}
