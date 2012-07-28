<?php

require_once LSF_Application::getApplicationPath() . '/../externals/clockwork-php/class-ClockworkException.php';
require_once LSF_Application::getApplicationPath() . '/../externals/clockwork-php/class-Clockwork.php';

/**
 * Outgoing text model
 * 
 * @author sam
 */

class Model_Text_Outgoing
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
	 * Sends the message
	 * 
	 * @return bool
	 */
	public function send()
	{
		$clockwork = new Clockwork(LSF_Config::get('mediaburst_api_key'));
		$response = $clockwork->send(array(
			'to'	  => $this->_to,
			'message' => $this->_text,
		));
		
		return !empty($response['success']);
	}
}
