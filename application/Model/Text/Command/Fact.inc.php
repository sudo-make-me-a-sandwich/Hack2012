<?php

/**
 * Echo command class
 * 
 * @author sam
 */

class Model_Text_Command_Fact extends Model_Text_Command_RandomAbstract
{
	public function __construct()
	{
		parent::__construct('facts');
	}
}
