<?php

/**
 * Session list model
 * 
 * @author sam
 */

class Model_Session_List extends Model_MongoAbstract
{
	public function __construct()
	{
		parent::__construct('sessions');
	}
	
	/**
	 * Returns an available session
	 * 
	 * @return Model_Session
	 */
	public function findAvailableSession()
	{
		$result = $this->getDb()->sessions->find(array('users_count' => 1))->sort(array('updated_timestamp'));
		
		foreach ($result as $id => $doc)
		{
			$session = new Model_Session();
			$session->load($id);
			return $session;
		}
	}
}
