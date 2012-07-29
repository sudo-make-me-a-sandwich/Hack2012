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
			
			$handler = new Model_Web_Outgoing();
			$this->view->messageSent = $text->process($handler);
				
			if ($response = $handler->getText()) {
				$this->view->response = $response;
			}
		}
		
		$this->addMessageHistoryToView();
	}
	
	/**
	 * Adds message history to the view
	 * 
	 * @return void
	 */
	private function addMessageHistoryToView()
	{
		$currentSession = $sessionsArray = array();
		
		$sessions = new Model_Session_List();
		
		foreach ($sessions->loadByUser($this->getUser()->getId()) as $session)
		{
			$messages = new Model_Message_List();
			
			foreach ($messages->loadBySession($session->getId()) as $message)
			{
				$messageArray = array(
					'id'		=> $message->getId(),
					'text'		=> $message->getText(),
					'sentBy'	=> $message->getFrom() == $this->getUser()->getPhoneNumber() ? 'you' : 'them',
					'timestamp' => $message->getTimestamp(),
				);
				
				if ($session->getId() == $this->getUser()->getSessionId()) {
					$currentSession[] = $messageArray;
				}
				else {
					$sessionsArray[$session->getId()][] = $messageArray;
				}
			}
		}
		
		$this->view->currentSession = $currentSession;
		$this->view->sessions = $sessionsArray;
	}
}
