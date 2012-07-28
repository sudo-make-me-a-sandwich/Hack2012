<?php

/**
 * Echo command class
 * 
 * @author sam
 */

class Model_Text_Command_Echo extends Model_Text_Command_BaseAbstract
{
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	protected function getResponse()
	{
		return $this->getInput();
	}
}
