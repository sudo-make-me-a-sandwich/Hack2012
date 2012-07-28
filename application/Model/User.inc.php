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
