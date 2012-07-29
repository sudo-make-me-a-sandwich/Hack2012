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
		$this->addMessageHistoryToView();
		
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
	
	/**
	 * Adds message history to the view
	 * 
	 * @return void
	 */
	private function addMessageHistoryToView()
	{
		$viewMessages = array();
		
		$sessions = new Model_Session_List();
		
		foreach ($sessions->loadByUser($this->getUser()->getId()) as $session)
		{
			$messages = new Model_Message_List();
			
			foreach ($messages->loadBySession($session->getId()) as $message)
			{
				$viewMessages[] = array(
					'id'   => $message->getId(),
					'text' => $message->getText(),
				);
			}
		}
		
		$this->view->messages = $viewMessages;
	}
}
