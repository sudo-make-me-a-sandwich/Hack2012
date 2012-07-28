<?php

/**
 * User model
 * 
 * @author sam
 */

abstract class Model_MongoAbstract
{
	private
		$_values,
		$_mongo,
		$_collection,
		$_db;
	
	public function __construct($collectionName)
	{
		if (!is_string(($collectionName))) {
			throw new InvalidArgumentException('Invalid collection name: ' . $collectionName);
		}
		
		$this->_collection = $collectionName;
	}
	
	/**
	 * Returns the document Id
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->getValue('_id');
	}
	
	/**
	 * Returns the collection name
	 * 
	 * @return string
	 */
	protected function getCollectionName()
	{
		return $this->_collection;
	}
	
	/**
	 * Load a document by ID
	 * 
	 * @param string $id
	 * @return bool
	 */
	public function load($id)
	{
		$result = $this->getDb()->{$this->_collection}->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($result)) {
			$this->_values = $result;
		}
	}
	
	/**
	 * Save the message
	 * 
	 * @return LSF_Validation_Result
	 */
	public function save()
	{
		if ($this->getDb()->{$this->_collection}->insert($this->_values)) {
			return new LSF_Validation_Result();
		}
	}
	
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
	
	/**
	 * Returns a value from the document
	 * 
	 * @param string $key
	 * @return mixed
	 */
	protected function getValue($key)
	{
		return isset($this->_values[$key]) ? $this->_values[$key] : null;
	}
	
	/**
	 * Sets a value in the document
	 * 
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function setValue($key, $value)
	{
		$this->_values[$key] = $value;
	}
	
	/**
	 * Returns the data for this object in an associative array
	 * 
	 * @return array
	 */
	protected function getData()
	{
		return $this->_values;
	}
}
