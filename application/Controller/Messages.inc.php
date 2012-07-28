<?php

/**
 * /txt
 * Messages controller
 *
 * @package /txt
 */

class Controller_Messages extends LSF_Controller
{
	/**
	 * Default index action
	 *
	 * @return void
	 */
	protected function indexAction()
	{
		$form = new Form_Message();
		$this->view->form = $form->render();
		
		if ($form->formSubmitted() && $form->formValidated()) {
			$this->view->messageSent = true;
		}
	}
}
