<?php

/**
 * Echo command class
 * 
 * @author sam
 */

class Model_Text_Command_Drink extends Model_Text_Command_RandomAbstract
{
	public function __construct()
	{
		parent::__construct('drinks');
	}
}
