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
				$user->clearSession();
				$session = $user->findSession(); 
				
				$text = new Model_Text_Outgoing();
				$text->setTo($user->getPhoneNumber());

				if ($session->isLonely()) {
					$text->setText("The other person got bored. :-( You're now waiting for a new partner.");
				}
				else {
					$text->setText("The other person got bored. :-( You've been paired with someone new. Please send a new message and try to be more interesting this time!");
				}
				
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
