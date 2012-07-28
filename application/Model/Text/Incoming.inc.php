<?php

/**
 * Incoming text message parser
 * 
 * @author sam
 */

class Model_Text_Incoming
{
	private
		$_text;
	
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
	
	private function parseCommand()
	{
		$spacePosition = strpos($this->_text, ' ');
		$command = substr($this->_text, 1, $spacePosition ? strpos($this->_text, ' ') : strlen($this->_text));
		
		if (!empty($command) && file_exists(LSF_Application::getApplicationPath() . '/Model/Text/Command/' . $command . '.inc.php'))
		{
			$className = 'Model_Text_Command_' . $command;
			$command = new $className();
			
			$command->run();
		}
		
		return false;
	}
}
