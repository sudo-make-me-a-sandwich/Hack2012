<?php

/**
 * /txt
 * Default controller
 *
 * @package 
 * $Id: Default.inc.php 6 2009-08-26 11:11:40Z sam $
 */

class Controller_Default extends LSF_Controller
{
	/**
	 * Default index action
	 * 
	 * @return void
	 */
	protected function indexAction()
	{
		$form = new Form_Login();
		$this->view->form = $form->render();
		
		if ($form->formSubmitted() && $form->formValidated())
		{
			/**
			 * Temp code
			 */
			$user = new Model_User();
			if (!$user->loadByPhonenumber($form->getElementValue('phonenumber'))) {
				$this->redirect('register', null, null, '?phonenumber=' . $form->getElementValue('phonenumber'));
			}
			else
			{
				if ($user->auth($form->getElementValue('password')))
				{
					LSF_Session::GetSession()->phonenumber = $form->getElementValue('phonenumber');
					LSF_Session::GetSession()->password = $user->hashPassword($form->getElementValue('password'));
					$this->redirect('messages');
				}
				else {
					$this->view->invalidLogin = true;
				}
			}
			
			
		}
	}
}
