<?php
/**
 * Base class for encoder to be implemented per service ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
abstract class Encoder{
	
	/**
	 * The output ...
	 * @var Array
	 */
	protected $output = array();
	
	/**
	 * Default Setting ...
	 * @var Setting
	 */
	protected $setting = null;
	
	/**
	 * Returns an associative array to be used in encoding ...
	 * @param $result Result of the action
	 * @param Setting $otherSettings An object to be used by the encoder in encoding the desired result 
	 */
	public abstract function json_encode($result, Setting $otherSetting = null);
	
	
	
	public function json_passed($object = null){
		return array("result"=>true);
	}
	
	public function json_failed(){
		return array("result"=>false);
	}
}