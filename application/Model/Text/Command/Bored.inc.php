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
		foreach ($this->getUser()->getSession()->getUsers() as $user)
		{
			if ($user->getId() != $this->getUser()->getId())
			{
				$text = new Model_Text_Outgoing();
				$text->setTo($user->getPhoneNumber());
				$text->setText("The other person got bored. :-( You're now waiting for a new partner.");
				$text->send();
			}
		}
		
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
