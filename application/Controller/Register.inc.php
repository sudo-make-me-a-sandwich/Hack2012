<?php

/**
 * /txt
 * Default controller
 *
 * @package 
 * $Id: Default.inc.php 6 2009-08-26 11:11:40Z sam $
 */

class Controller_Register extends LSF_Controller
{
	/**
	 * Default index action
	 * 
	 * @return void
	 */
	protected function indexAction()
	{
		$form = new Form_Register();
			
		if ($this->getRequest()->getGetVar('phonenumber')) {
			$form->setElementValue('phonenumber', $this->getRequest()->getGetVar('phonenumber'));
		}
		
		$this->view->form = $form->render();
		
		if ($form->formSubmitted() && $form->formValidated())
		{
			/**
			 * Temp code
			 */
			$user = new Model_User();
			
			$user->loadByPhonenumber($form->getElementValue('phonenumber'));
			$user->setPhoneNumber($form->getElementValue('phonenumber'));
			$user->setPassword($form->getElementValue('password'));
			$user->save();
			
			LSF_Session::GetSession()->phonenumber = $form->getElementValue('phonenumber');
			LSF_Session::GetSession()->password = $user->getPassword();
			
			$this->redirect('messages');
		}
	}
}
