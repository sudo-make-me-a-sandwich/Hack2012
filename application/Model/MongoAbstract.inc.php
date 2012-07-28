<?php

/**
 * User model
 * 
 * @author sam
 */

abstract class Model_MongoAbstract
{
	private
		$_mongo,
		$_db;
	
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
			$this->_db = $this->_mongo->selectDB(LSF_Config::get('mongo_db_name'));
		}
		
		return $this->_db;
	}
}
