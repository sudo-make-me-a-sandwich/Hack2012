<?php

/**
 * Echo command class
 * 
 * @author sam
 */

class Model_Text_Command_RandomAbstract extends Model_Text_Command_BaseAbstract
{
	private
		$_filePath;
		
	public function __construct($type)
	{
		$filePath = LSF_Application::getApplicationPath() . '/Data/' . $type . '.json';
		
		if (!file_exists($filePath)) {
			throw new Exception('Bad path to response file');
		}
		$this->_filePath = $filePath;
	}
	
	/**
	 * Returns the command response
	 * 
	 * @return string
	 */
	protected function getResponse()
	{
		$data = json_decode(file_get_contents($this->_filePath));
		return $data[array_rand($data)];
	}
}
