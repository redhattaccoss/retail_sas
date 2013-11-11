<?php
/**
 * Checks for Required Fields ...
 * @author Tapion
 *
 */
class RequiredChecker implements IChecker{
	private $fields;
	private $fieldsWithError;
	public function __construct($fields = array()){
		$this->fields = $fields;
	}
	
	public function check(){
		if (!empty($this->fields)){
			foreach($this->fields as $field){
				$value = Request::getSafeGetOrPost($field);
				if (trim($value)==""){
					$this->fieldsWithError[] = $field;
				}
			}
			if (empty($this->fieldsWithError)){
				return true;				
			}
			return false;
		}
		return true;
	}
	public function getMessage(){		
		return $this->fieldsWithError;
	}
	
	public function json_result(){
		$output = array();
		if (!empty($this->fieldsWithError)){
			foreach($this->fieldsWithError as $field){
				$temp = array(
					"field"=>$field,
					"message"=>ucwords($field)." is required.",
					"code"=>"required"
				);
				$output[] = $temp;
			}
		}
		return $output;
	}
}