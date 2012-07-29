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
	
	public function findAvailableSession()
	{
		$this->getDb()->sessions->find(array());
	}
}
