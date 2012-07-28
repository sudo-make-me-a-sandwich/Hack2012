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
		
		if ($form->formSubmitted() && $form->formValidated())
		{
			$text = new Model_Text_Incoming();
			$text->setText($form->getElementValue('message'));
			
			$this->view->messageSent = $text->process();
		}
	}
}
