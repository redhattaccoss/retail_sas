<?php
/**
 * Base class for Restful Service. It also provides checking for additional condition checking before executing actual method  ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 */
abstract class Service{
	
	/**
	 * Encoder of result ...
	 * @var Encoder
	 */
	protected $encoder;
	
	/**
	 * DAO class to be used for the service ...
	 */
	protected $dao;
	
	/**
	 * The error code. When zero, its means it did not encounter an error 
	 * during the beforeExecute method, thus allowing the method to execute its business logic ...
	 * @var int
	 * @see APIErrorCodes
	 */
	protected $errorCode = 0;
	
	/**
	* List of Validators
	*/
	protected $validators = array();
	
	/**
	 * Validation Errors to be filled when validate method is executed ...
	 * @var array
	 */
	protected $validationErrors = array();
	
	
	/**
	 * Default setting object ...
	 * @var Setting
	 */
	protected $setting = null;
	
	
	
	public function __construct(){
		//$this->validators[] = new AuthChecker();
	}
	
	/**
	 * Method to check if the user is authenticated. It adds a level of security before executing the actual method ...
	 */
	protected function isAuthenticated(){
		return Session::getInstance()->getAuthenticationManager()->isAuthenticated();
	}
	
	
	/**
	 * Before Execute, abstract method to be used before executing actual method ... can be overridden for custom clean up
	 */
	protected function beforeExecute(){
		/*
		if (!$this->isAuthenticated()){
			$this->errorCode = APIErrorCodes::$API_ERROR_NOT_AUTHENTICATED;
		}
		*/
		$this->validate();
	}
	
	
	protected function validate(){
		if (!empty($this->validators)){
			foreach($this->validators as $validator){
				/* @var $validator IChecker */
				if (!$validator->check()){
					$result = $validator->json_result();
					if (is_array($result)){
						if (!isset($this->validationErrors["errors"])){
							$this->validationErrors["errors"] = array();
						}
						$this->validationErrors["errors"] = array_merge($this->validationErrors["errors"], $result);
					}else{
						$this->validationErrors["errors"][] = $result;
					}
					break;
				}
			}
		}
	}
	
	/**
	 * After Execute, abstract method to be used for clean up ... can be overridden for custom clean up
	 */
	protected function afterExecute(){
		
	}
	/**
	 * Individual implementation for every service class ...
	 */
	protected abstract function runImplementation();
	
	
	
	/**
	 * Runs the method ...
	 */
	public function run(){
		$result = array();
		//perform beforeExecute events. you can include checking that can prevent execution of the implementation method
		$this->beforeExecute();
		//The error code. When zero, its means it did not encounter an error during the beforeExecute method, thus allowing the method to execute its business logic ...
		if ($this->errorCode==0){
			//run implementation
			if (empty($this->validationErrors["errors"])){
				$result = $this->runImplementation();
				if (!isset($result["result"])){		
					$result["result"] = true;	
				}
			}else{
				$result = $this->validationErrors;
				$result["result"] = false;
			}
		}
		//perform clean up events after run implementations
		$this->afterExecute();
		return $result;
	}
}