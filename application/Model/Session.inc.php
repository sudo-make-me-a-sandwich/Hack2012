<?php

/**
 * Session model
 * 
 * @author sam
 */

class Model_Session extends Model_MongoAbstract
{
	public function __construct()
	{
		parent::__construct('sessions');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see application/Model/Model_MongoAbstract::save()
	 */
	public function save()
	{
		$this->setValue('updated_timestamp', time());
		return parent::save();
	}
	
	/**
	 * Add a user to this session
	 * 
	 * @param Model_User $user
	 * @return void
	 */
	public function addUser(Model_User $user)
	{
		if (!$users = $this->getValue('users')) {
			$users = array();
		}
		
		$users[] = $user->getId();
		$this->setValue('users', $users);
	}
	
	/**
	 * Returns whether or not there's only one user in this session
	 * 
	 * @return bool
	 */
	public function isLonely()
	{
		return count($this->getValue('users')) === 1;
	}
}
