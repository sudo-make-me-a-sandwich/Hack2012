<?php

/**
 *
 *
 * @package 
 * $Id$
 */

class Console_Controller_Message extends LSF_Console_Controller
{	
	public function usageAction() {}
	
	protected function indexAction() {}
	
	protected function createAction()
	{
		$message = new Model_Message();
		$message->setText('Test');
		$message->save();
		
		$this->response->appendLine('Message created with ID: ' . $message->getId());
	}
	
	protected function getAction()
	{
		$message = new Model_Message();
		$message->load(LSF_Dispatch_Console::$arguments[0]);
		
		$this->response->appendLine('Message: ' . $message->getText());
	}
}
