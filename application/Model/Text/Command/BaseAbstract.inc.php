<?php

/**
 * Abstract base class for text commands
 * 
 * @author sam
 */

abstract class Model_Text_Command_BaseAbstract
{
	private
		$_fromNumber;
	
	/**
	 * Set the "from" phone number
	 * 
	 * @param string $number
	 * @return Model_Text_Command_BaseAbstract
	 */
	public function setFrom($number)
	{
		if (is_numeric($number)) {
			$this->_fromNumber = $number;
		}
		
		return $this;
	}
	
	/**
	 * Run the command
	 * 
	 * @return bool
	 */
	public function run()
	{
		$outgoingText = new Model_Text_Outgoing();
		$outgoingText->setTo($this->_fromNumber);
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
