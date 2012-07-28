<?php

/**
 * Message model
 * 
 * @author sam/tom
 */

class Model_Message extends Model_MongoAbstract
{
	public function __construct()
	{
		parent::__construct('message');
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
