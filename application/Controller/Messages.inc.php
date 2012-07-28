<?php

/**
 * /txt
 * Messages controller
 *
 * @package /txt
 */

class Controller_Messages extends Controller_AuthAbstract
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
			$text->setFrom($this->getUser());
			$text->setText($form->getElementValue('message'));
			
			$this->view->messageSent = $text->process();
		}
	}
}
