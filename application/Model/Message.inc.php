<?php

/**
 * Message model
 * 
 * @author sam
 */

class Model_Message extends Model_MongoAbstract
{
	private 
		$_text,
		$_from;
	
	/**
	 * Save the message
	 * 
	 * @return LSF_Validation_Result
	 */
	public function save()
	{
		$this->getDb()->message->insert($this->getData());
		return new LSF_Validation_Result();
	}
	
	/**
	 * Returns data for storage
	 * 
	 * @return array
	 */
	private function getData()
	{
		return array('text' => $this->_text);
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
			$this->_text = $text;
		}
	}
}
