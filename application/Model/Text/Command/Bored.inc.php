<?php

/**
 * Bored command class
 * 
 * @author sam
 */

class Model_Text_Command_Bored extends Model_Text_Command_BaseAbstract
{
	/**
	 * (non-PHPdoc)
	 * @see application/Model/Text/Command/Model_Text_Command_BaseAbstract::run()
	 */
	public function run(Model_IOutgoing $handler=null)
	{
		$this->getUser()->clearSession();
		return parent::run($handler);
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	protected function getResponse()
	{
		return 'Left session';
	}
}
