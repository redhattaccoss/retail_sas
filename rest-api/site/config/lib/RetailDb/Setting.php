<?php
/**
 * Base class for a Setting object to be used in rendering results by Encoder classes ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
abstract class Setting{
	/**
	 * A value used to get whether enabledOnly items or not ...
	 * @var String
	 */
	private $enabledOnly = "1";
	
	/**
	 * A value to indicate if rendering detailed or not ...
	 * @var boolean
	 */
	private $detailed = false;
	
	/**
	* Specifies data to be handled if individual category or multiple categories
	 */
	private $mode = "multiple";
	
	public static $MULTIPLE = "multiple";
	public static $INDIVIDUAL = "individual";
	
	/**
	 * Get enabledOnly field's value ...
	 */
	public function getEnabledOnly(){
		return $this->enabledOnly;
	}
	
	/**
	 * Set enabledOnly field's value ...
	 */
	public function setEnabledOnly($enabledOnly){
		if (trim($enabledOnly)!=""){
			$this->enabledOnly = $enabledOnly;
		}
	}
	

	/**
	 * Set mode field's value ...
	 * @param String $mode either multiple/individual
	 */
	public function setMode($mode){
		$this->mode = $mode;
	}

	/**
	 * Returns the mode ...
	 */
	public function getMode(){
		return $this->mode;
	}
	
	/**
	 * Set for detailed's value ...
	 * @param String $detailed either 1 or 0
	 */
	public function setDetailed($detailed){
		if ($detailed=="1"){
			$this->detailed = true;
		}else{
			$this->detailed = false;
		}
	}
	
	
	/**
	 * Gets for detailed's value ...
	 */
	public function getDetailed(){
		return $this->detailed;
	}
}