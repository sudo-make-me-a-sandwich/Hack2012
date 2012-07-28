<?php

/**
 * Help command class
 * 
 * @author sam
 */

class Model_Text_Command_Help extends Model_Text_Command_BaseAbstract
{
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	protected function getResponse()
	{
		return 'Some help text';
	}
}
