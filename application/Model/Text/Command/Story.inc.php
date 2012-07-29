<?php

/**
 * Story command class
 * 
 * @author sam
 */

class Model_Text_Command_Story extends Model_Text_Command_BaseAbstract
{
	/**
	 * (non-PHPdoc)
	 * @see application/Model/Text/Command/Model_Text_Command_BaseAbstract::run()
	 */
	public function run()
	{
		$this->getUser()->clearSession();
		$this->getUser()->findSession();
		
		return parent::run();
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	protected function getResponse()
	{
		return 'Story';
	}
}
