<?php

/**
 * Message form
 * 
 * @author sam
 */

class Form_Message extends LSF_Form
{
	/**
	 * (non-PHPdoc)
	 * @see framework/LSF_Form::initForm()
	 */
	protected function initForm()
	{
		$element = new LSF_Form_Element();
		
		$this->addElement(
			$element->setName('message')
			->setLabel('Send a message')
			->setRequired()
		);
	}
}
