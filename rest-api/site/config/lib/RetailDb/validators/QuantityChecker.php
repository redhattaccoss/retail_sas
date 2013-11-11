<?php
class QuantityChecker implements IChecker{
	
	private $quantity;
	private $field;
	
	public function __construct($field){
		$this->quantity = Request::getSafeGetOrPost($field);
		$this->field = $field;
	}
	
	
	/**
	 *  Returns true if value is not existing
	 * (non-PHPdoc)
	 * @see IChecker::check()
	 */
	public function check(){
		return ((is_numeric($this->quantity))&&(intval($this->quantity)>0));
	}
	public function getMessage(){
		return "";
	}
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"{$this->quantity} is not a valid {$this->field} value", "code"=>"quantity");
		
		return $output;
	}	
}