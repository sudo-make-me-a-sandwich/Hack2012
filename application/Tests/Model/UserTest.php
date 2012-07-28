<?php

/**
 * User model test class
 * 
 * @author sam
 */

class Model_UserTest extends PHPUnit_Framework_TestCase
{
	public function testLoad()
	{
		$user = new Model_User();
		$this->assertFalse($user->load('moo'));
	}
}
