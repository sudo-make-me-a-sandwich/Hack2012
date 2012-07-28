<?php

/**
 * Login form
 * 
 * @author sam
 */

class Form_Register extends LSF_Form
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
			->setLabel('Enter phonenumber')
			->setRequired()
		);
		
		$element = new LSF_Form_Element();
		
		$this->addElement(
			$element->setName('password')
			->setLabel('Password')
			->setType('password')
			->setRequired()
		);
		
		$element = new LSF_Form_Element();
		
		$this->addElement(
			$element->setName('passwordconfirm')
			->setLabel('Confirm Password')
			->setType('password')
			->setRequired()
		);
	}
	
	/**
	 * 
	 */
	public function formValidate()
	{
		$result = parent::formValidate();
		
		if ($this->getElementValue('password') != $this->getElementValue('passwordconfirm')) {
			$result->addError('password', 'Passwords do not match');
		}
		
		return $result;
	}
}
