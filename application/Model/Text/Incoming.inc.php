<?php

/**
 * Incoming text message parser
 * 
 * @author sam
 */

class Model_Text_Incoming
{
	private
		$_fromUser,
		$_text;
	
	/**
	 * Set the "from" user object
	 * 
	 * @param Model_User $user
	 * @return void
	 */
	public function setFrom(Model_User $user)
	{
		$this->_fromUser = $user;
	}
	
	/**
	 * Set the incoming message text
	 * 
	 * @param string $text
	 * @return void
	 */
	public function setText($text)
	{
		if (is_string($text)) {
			$this->_text = $text;
		}
	}
	
	/**
	 * Process the message text and do whatever is appropriate
	 * 
	 * @return bool
	 */
	public function process()
	{
		if (substr($this->_text, 0, 1) == '/') {
			return $this->parseCommand();
		}
		else {
			$this->createMessage();
		}
		
		return false;
	}
	
	/**
	 * Parse the text command
	 * 
	 * @return bool
	 */
	private function parseCommand()
	{
		$spacePosition = strpos($this->_text, ' ');
		$command 	   = substr($this->_text, 1, $spacePosition ? strpos($this->_text, ' ') : strlen($this->_text));
		$input		   = substr($this->_text, strlen($command));
		
		$command = ucfirst(strtolower(trim($command)));
		$input   = trim($input);
		
		if (!empty($command) && file_exists(LSF_Application::getApplicationPath() . '/Model/Text/Command/' . $command . '.inc.php'))
		{
			$className = 'Model_Text_Command_' . $command;
			$command = new $className();
			
			return $command->setInput($input)->setFrom($this->_fromUser->getPhoneNumber())->run();
		}
		
		return false;
	}
	
	/**
	 * Create a new (non-command) message
	 * 
	 * @return bool
	 */
	private function createMessage()
	{
		if (!$this->_fromUser->isInSession())
		{
			/**
			 * Look for an existing single-user session (who's been waiting longest)
			 * If found, add to session, send 2-way introductory messages
			 * If not, create new session and wait.
			 */
			
			
		}
		else {
			// Send message to session partner
		}
		
		return false;
	}
}
