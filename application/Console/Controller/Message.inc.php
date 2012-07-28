<?php

/**
 *
 *
 * @package 
 * $Id$
 */

class Console_Controller_Message extends LSF_Console_Controller
{
	/**
	 * Display usage info
	 * 
	 * @return void
	 */
	public function usageAction() {}
	
	/**
	 * Index action does nothing
	 * 
	 * @return void
	 */
	protected function indexAction() {}
	
	/**
	 * Create a test message
	 * 
	 * @return void
	 */
	protected function createAction()
	{
		$message = new Model_Message();
		$message->setText('Test');
		$message->save();
		
		$this->response->appendLine('Message created with ID: ' . $message->getId());
	}
	
	/**
	 * Output some message text
	 * 
	 * @return void
	 */
	protected function getAction()
	{
		$id = LSF_Dispatch_Console::$arguments[0];
		
		$message = new Model_Message();
		$message->load($id);
		
		$this->response->appendLine('Message (ID: ' . $id . '): ' . $message->getText());
	}
}
