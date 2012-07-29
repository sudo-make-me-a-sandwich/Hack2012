<?php

/**
 * Message model
 * 
 * @author sam/tom
 */

class Model_Message extends Model_MongoAbstract
{
	/**
	 * Constructs a message model object
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct('messages');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see application/Model/Model_MongoAbstract::save()
	 */
	public function save()
	{
		$this->setValue('timestamp', time());
		return parent::save();
	}
	
	/**
	 * Set the from number
	 * 
	 * @param string $fromNumber
	 * @return void
	 */
	public function setFrom($fromNumber)
	{
		if (is_numeric($fromNumber)) {
			$this->setValue('from', $fromNumber);
		}
	}
	
	/**
	 * Returns the from number
	 * 
	 * @return string
	 */
	public function getFrom()
	{
		return $this->getValue('from');
	}
	
	/**
	 * Set the message text
	 * 
	 * @param string $text
	 * @return void
	 */
	public function setText($text)
	{
		if (is_string($text)) {
			$this->setValue('text', $text);
		}
	}
	
	/**
	 * Returns the message text
	 * 
	 * @return string
	 */
	public function getText()
	{
		return $this->getValue('text');
	}
	
	/**
	 * Returns the timestamp for when the message was stored
	 * 
	 * @return int
	 */
	public function getTimestamp()
	{
		return $this->getValue('timestamp');
	}
	
	/**
	 * Set the session ID for this message
	 * 
	 * @param string $sessionId
	 * @return void
	 */
	public function setSessionId($sessionId)
	{
		$this->setValue('session_id', $sessionId);
	}
}
