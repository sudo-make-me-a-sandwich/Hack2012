<?php

/**
 * Outgoing text model
 * 
 * @author sam
 */

class Model_Text_Outgoing
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
	 * Sends the message
	 * 
	 * @return bool
	 */
	public function send()
	{
		echo $this->_text;
		return true;
	}
}
