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
	 * @return bool
	 */
	public function run()
	{
		$outgoingText = new Model_Text_Outgoing();
		$outgoingText->setTo('07751651394');
		$outgoingText->setText($this->getResponse());
		return $outgoingText->send();
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	abstract protected function getResponse();
}
