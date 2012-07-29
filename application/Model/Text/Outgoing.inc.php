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
		if ($this->_to && $this->_text)
		{
			if (LSF_Config::get('log_outbound_messages'))
			{
				$logger = new LSF_Utils_File_Log_Writer('/tmp/txts.log');
				$logger->info('Sending message to: [' . $this->_to . '] ' . $this->_text);
			}
			
			$clockwork = new Clockwork(LSF_Config::get('mediaburst_api_key'));
		
			$response = $clockwork->send(array(
				'from'	  => LSF_Config::get('txt_from'),
				'to'	  => $this->_to,
				'message' => $this->_text,
			));
			
			return !empty($response['success']);
		}
	}
}
