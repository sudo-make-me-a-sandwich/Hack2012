<?php

/**
 *
 *
 * @package 
 * $Id$
 */

class Console_Controller_Test extends LSF_Console_Controller
{	
	protected function indexAction()
	{
		$this->response->appendLine('Txt test!');
		$this->response->appendLine('');
		
		$message = new Model_Message();
		$message->load('moo');
	}
	
	public function usageAction() {}
}
