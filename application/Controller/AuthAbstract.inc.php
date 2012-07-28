<?php

/**
 * Abstract auth controller
 *
 * @package
 */

abstract class Controller_AuthAbstract extends LSF_Controller
{
	private
		$_user;
		
	/**
	 * (non-PHPdoc)
	 * @see framework/LSF_Controller::start()
	 */
	public function start()
	{
		if (!$this->isAuthed())
		{
			$this->authFailed();
			return;
		}
		
		return parent::start();
	}
	
	/**
	 * Returns whether or not the user is auth'd
	 * 
	 * @return bool
	 * @todo implement this
	 */
	private function isAuthed()
	{
		$this->_user = new Model_User();
		$this->_user->loadByPhonenumber(LSF_Session::GetSession()->phonenumber);
		return $this->_user->auth(LSF_Session::GetSession()->password, true);
	}
	
	/**
	 * Returns the currently logged in user
	 * 
	 * @return Model_User
	 */
	protected function getUser()
	{
		return $this->_user;
	}
	
	/**
	 * Do this if auth failed (oh noes!)
	 * 
	 * @return void
	 */
	private function authFailed()
	{
		$this->redirect();
	}
}
