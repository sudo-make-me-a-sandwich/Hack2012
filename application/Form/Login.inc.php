<?php

/**
 * Login form
 * 
 * @author sam
 */

class Form_Login extends LSF_Form
{
	/**
	 * (non-PHPdoc)
	 * @see framework/LSF_Form::initForm()
	 */
	protected function initForm()
	{
		$element = new LSF_Form_Element();
		
		$this->addElement(
			$element->setName('phonenumber')
			->setLabel('Phone number')
			->setRequired()
		);
		
		$element = new LSF_Form_Element();
		
		$this->addElement(
			$element->setName('password')
			->setType('password')
			->setLabel('Password')
		);
	}
}
