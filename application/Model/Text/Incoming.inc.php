<?php

/**
 * Incoming text message parser
 * 
 * @author sam
 */

class Model_Text_Incoming
{
	private
		$_fromNumber,
		$_text;
	
	/**
	 * Set the "from" phone number
	 * 
	 * @param string $number
	 * @return void
	 */
	public function setFrom($number)
	{
		if (is_numeric($number)) {
			$this->_fromNumber = $number;
		}
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
			
			return $command->setInput($input)->setFrom($this->_fromNumber)->run();
		}
		
		return false;
	}
}
