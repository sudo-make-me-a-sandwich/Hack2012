<?php

/**
 * User model
 * 
 * @author sam
 */

class Model_User extends Model_MongoAbstract
{
	public function __construct()
	{
		parent::__construct('user');
	}
	
	/**
	 * Load a user by phonenumber
	 * 
	 * @param string $phonenumber
	 * @return bool
	 */
	public function loadByPhonenumber($phonenumber)
	{
		$result = $this->getDb()->{$this->getCollectionName()}->findOne(array('phonenumber' => $phonenumber));
		
		if (!empty($result))
		{
			$this->setData($result);
			return true;
		}
		
		return false;
	}
	
	/**
	 * Set the phone number
	 * 
	 * @param string $text
	 * @return void
	 */
	public function setPhoneNumber($phonenumber)
	{
		$this->setValue('phonenumber', $phonenumber);
	}
	
	/**
	 * Returns the phone number
	 * 
	 * @return string
	 */
	public function getPhoneNumber()
	{
		return $this->getValue('phonenumber');
	}
}
