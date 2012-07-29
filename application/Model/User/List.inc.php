<?php

/**
 * Session list model
 * 
 * @author sam
 */

class Model_User_List extends Model_MongoAbstract
{
	public function __construct()
	{
		parent::__construct('users');
	}
	
	/**
	 * Returns  available users for a session
	 * 
	 * @param string $sessionId
	 * @return array
	 */
	public function findUsersActiveInSession($sessionId)
	{
		$result = $this->getDb()->users->find(array('session_id' => $sessionId));
		$returnArray = array();
		
		foreach ($result as $id => $doc)
		{
			$user = new Model_User();
			
			if ($user->load($id)) {
				$returnArray[] = $user;
			}
		}
		
		return $returnArray;
	}
}
