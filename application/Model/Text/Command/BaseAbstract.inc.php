<?php

/**
 * Abstract base class for text commands
 * 
 * @author sam
 */

abstract class Model_Text_Command_BaseAbstract
{
	/**
	 * Run the command
	 * 
	 * @return void
	 */
	public function run()
	{
		$outgoingText = new Model_Text_Outgoing();
		$outgoingText->setText($this->getResponse());
		$outgoingText->send();
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	abstract protected function getResponse();
}
