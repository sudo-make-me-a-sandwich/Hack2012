<?php

/**
 * Abstract base class for text commands
 * 
 * @author sam
 */

abstract class Model_Text_Command_BaseAbstract
{
	private
		$_fromUser,
		$_input;
	
	/**
	 * Run the command
	 * 
	 * @return bool
	 */
	public function run()
	{
		$outgoingText = new Model_Text_Outgoing();
		$outgoingText->setTo($this->_fromUser->getPhoneNumber());
		$outgoingText->setText($this->getResponse());
		return $outgoingText->send();
	}
	
	/**
	 * Set the "from" user
	 * 
	 * @param Model_User $user
	 * @return Model_Text_Command_BaseAbstract
	 */
	public function setFromUser(Model_User $user)
	{
		$this->_fromUser = $user;
		return $this;
	}
	
	/**
	 * Returns the from user object
	 * 
	 * @return Model_User
	 */
	public function getUser()
	{
		return $this->_fromUser;
	}
	
	/**
	 * Set the command input
	 * 
	 * @param string $input
	 * @return Model_Text_Command_BaseAbstract
	 */
	public function setInput($input)
	{
		if (is_string($input)) {
			$this->_input = $input;
		}
		
		return $this;
	}
	
	/**
	 * Returns any command input
	 * 
	 * @return string
	 */
	protected function getInput()
	{
		return $this->_input;
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	abstract protected function getResponse();
}
