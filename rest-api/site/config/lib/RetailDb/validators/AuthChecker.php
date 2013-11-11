<?php
class AuthChecker implements IChecker{
	public function check(){
		return Session::getInstance()->getAuthenticationManager()->isAuthenticated();
	}
	
	public function getMessage(){
		return "Not authenticated";
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>$this->getMessage(), "code"=>"authenticated");
		return $output;
	}
	
}