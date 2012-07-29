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
}
