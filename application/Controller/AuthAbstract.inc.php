<?php

/**
 *
 *
 * @package
 * $Id$
 */

abstract class Controller_AuthAbstract extends LSF_Controller
{
	public function start()
	{
		if (!$this->isAuthed()) {
			$this->authFailed();
			return;
		}
		
		return parent::start();
	}
	
	private function isAuthed()
	{
		return false;
	}
	
	private function authFailed()
	{
		$this->redirect();
	}
}
