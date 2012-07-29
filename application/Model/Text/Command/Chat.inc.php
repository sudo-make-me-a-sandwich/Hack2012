<?php

/**
 * Chat command class
 * 
 * @author sam
 */

class Model_Text_Command_Chat extends Model_Text_Command_BaseAbstract
{
	private
		$_response;
	
	/**
	 * (non-PHPdoc)
	 * @see application/Model/Text/Command/Model_Text_Command_BaseAbstract::run()
	 */
	public function run()
	{
		if (!$this->getUser()->isInSession())
		{
			$session = $this->getUser()->findSession();
			
			if (!$session->isLonely())
			{
				$users = new Model_User_List();
				$sessionUsers = $users->findUsersActiveInSession($session->getId());
				
				foreach ($sessionUsers as $recipient)
				{
					if ($recipient->getId() != $this->getUser()->getId()) {
						$messageText = "An awesome new person has joined your chat session. You can now reply to this message to say hello.";
					}
					else {
						$messageText = "You've been paired with someone. Hang tight, you should receive a message from them soon.";
					}
					
					$text = new Model_Text_Outgoing();
					$text->setTo($recipient->getPhoneNumber());
					$text->setText($messageText);
					$text->send();
				}
			}
			else {
				$this->_response = "You've now entered a chat session, waiting for a partner.";
			}
		}
		else {
			$this->_response = 'You are already in a chat session. Reply /bored if you want to leave it.';
		}
		
		return parent::run();
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	protected function getResponse()
	{
		return $this->_response;
	}
}
