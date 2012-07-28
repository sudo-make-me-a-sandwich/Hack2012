<?php

/**
 * Message model
 * 
 * @author sam
 */

class Model_Message extends Model_MongoAbstract
{
	private
		$_id,
		$_values = array(
			'text'		=> null,
			'from'		=> null,
			'sessionId' => null,
		);
	
	public function getId()
	{
		return isset($this->_values['_id']) ? $this->_values['_id'] : null;
	}
		
	/**
	 * Load a message by ID
	 * 
	 * @param string $id
	 * @return bool
	 */
	public function load($id)
	{
		$result = $this->getDb()->message->find(array('_id' => $id));
	}
	
	/**
	 * Save the message
	 * 
	 * @return LSF_Validation_Result
	 */
	public function save()
	{
		if ($this->getDb()->message->insert($this->_values)) {
			return new LSF_Validation_Result();
		}
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
			$this->_values['text'] = $text;
		}
	}
	
	public function getText()
	{
		return $this->_values['text'];
	}
}
