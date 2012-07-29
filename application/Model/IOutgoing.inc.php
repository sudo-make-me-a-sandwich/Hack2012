<?php

/**
 * Outgoing message interface
 * 
 * @author sam
 */

interface Model_IOutgoing
{
	/**
	 * Set the recipient's number
	 * 
	 * @param unknown_type $number
	 * @return void
	 */
	public function setTo($number);
		
	/**
	 * Set the incoming message text
	 * 
	 * @param string $text
	 * @return void
	 */
	public function setText($text);
	
	/**
	 * Sends the message
	 * 
	 * @return bool
	 */
	public function send();
}
