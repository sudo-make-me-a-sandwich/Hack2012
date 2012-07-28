<?php

/**
 * User model
 * 
 * @author sam
 */

abstract class Model_MongoAbstract
{
	private
		$_mongo;
	
	/**
	 * Returns a mongo DB object
	 * 
	 * @return Mongo
	 */
	protected function getDb()
	{
		if (!$this->_mongo)
		{
			$this->_mongo = new Mongo();
			$this->_mongo->selectDB(LSF_Config::get('mongo_db_name'));
		}
		
		return $this->_mongo;
	}
}
