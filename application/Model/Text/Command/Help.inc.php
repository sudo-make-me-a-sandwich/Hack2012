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
		return 'Send /chat to talk to someone, and /bored to leave the current chat session. You can also send one of /joke, /insult, /drink, /fact, /catfact, flirt or /help (duh!)';
	}
}
