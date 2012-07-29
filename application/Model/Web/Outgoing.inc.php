<?php

/**
 * Outgoing message model
 * 
 * @author sam
 */

class Model_Web_Outgoing implements Model_IOutgoing
{
	private
		$_to,
		$_text;
	
	/**
	 * Set the recipient's number
	 * 
	 * @param unknown_type $number
	 * @return void
	 */
	public function setTo($number)
	{
		if (is_numeric($number)) {
			$this->_to = $number;
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
	 * Get the message text
	 * 
	 * @param string $text
	 * @return void
	 */
	public function getText()
	{
		return $this->_text;
	}
	
	/**
	 * Sends the message
	 * 
	 * @return bool
	 */
	public function send()
	{
		return true;
	}
}
