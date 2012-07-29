<?php

/**
 * Message list model
 * 
 * @author sam
 */

class Model_Message_List extends Model_MongoAbstract
{
	public function __construct()
	{
		parent::__construct('messages');
	}
	
	public function loadBySession($sessionId)
	{
		$result = $this->getDb()->messages->find(array('session_id' => $sessionId));
		$returnArray = array();
		
		foreach ($result as $id => $doc)
		{
			$message = new Model_Message();

			if ($message->load($id)) {
				$returnArray[] = $message;
			}
		}
		
		return $returnArray;
	}
}
