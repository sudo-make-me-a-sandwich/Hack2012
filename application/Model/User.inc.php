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
		parent::__construct('users');
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
	
	/**
	 * Set the password
	 * 
	 * @param string $password
	 * @return void
	 */
	public function setPassword($password)
	{
		$this->setValue('password', $this->hashPassword($password));
	}
	
	/**
	 * Returns the user's password hash
	 * 
	 * @return string
	 */
	public function getPassword()
	{
		return $this->getValue('password');
	}
	
	/**
	 * Check the users credentials
	 * 
	 * @param string $password
	 * @param bool $passingHash
	 * @return bool
	 */
	public function auth($password, $passingHash=false)
	{
		if (!$passingHash) {
			$password = $this->hashPassword($password);
		}
		
		return $this->getPhoneNumber() && !empty($password) && $this->getValue('password') == $password;
	}
	
	/**
	 * Returns a hashed version of the password
	 * 
	 * @return string
	 */
	public function hashPassword($password)
	{
		return hash('whirlpool', 'mooe23d' . $password . '67saGAFbgjkn^SD');
	}
	
	/**
	 * Returns whether or not this user is currently in a text chat session
	 * 
	 * @return bool
	 */
	public function isInSession()
	{
		return (bool)$this->getSessionId();
	}
	
	/**
	 * Returns the current session ID
	 * 
	 * @return string
	 */
	public function getSessionId()
	{
		return $this->getValue('session_id');
	}
	
	/**
	 * Returns a session object for this user
	 * 
	 * @return Model_Session
	 */
	public function getSession()
	{
		$session = new Model_Session();
		$session->load($this->getSessionId());
		return $session;
	}
	
	/**
	 * Clear the current session
	 * 
	 * @return void
	 */
	public function clearSession()
	{
		$this->setValue('session_id', null);
		$this->save();
	}
	
	/**
	 * Finds an available text partner (if it can)
	 * 
	 * @return Model_Session
	 */
	public function findPartner()
	{
		$sessionList = new Model_Session_List();
		
		if (!$session = $sessionList->findAvailableSession()) {
			$session = new Model_Session();
		}
		
		$session->addUser($this);
		$session->save();
		
		$this->setValue('session_id', $session->getId());
		$this->save();
		
		return $session;
	}
	
	/**
	 * Get a user for a given phone number
	 * Will create the user if doesn't exist
	 * 
	 * @param string $phonenumber
	 * @return Model_User
	 */
	public static function Get($phonenumber)
	{
		$object = new Model_User();
		
		if (!$object->loadByPhonenumber($phonenumber))
		{
			$object->setPhoneNumber($phonenumber);
			$object->save();
		}
		
		return $object;
	}
}
