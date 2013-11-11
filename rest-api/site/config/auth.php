<?php
/**
 * Copyright 2011 - Inform8
 * http://www.inform8.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * http://www.apache.org/licenses/LICENSE-2.0
 */
  
  $authManager = Session::getInstance()->getAuthenticationManager();
  
  if (Request::getSafeGetOrPost("call") == 'logout') {
    $authManager->reset();
    $output["result"] = true;	
  	echo json_encode($output);
    exit;
  } 
  $output = array();
  $call = Request::getSafeGetOrPost("call");
  if (!$authManager->isAuthenticated()) {
  	//attempt login if set
  	if ($call == 'login') {
  		if ($authManager->performAuthentication()) {
  			// TODO - Encode response to user
  				$output["result"] = true;	
  				/* @var $wholesaler Wholesaler */
  				$wholesaler = $authManager->getUser();
  				$output["wholesaler"] = array("id"=>$wholesaler->getPk(), "name"=>$wholesaler->getName());
  				
  		}else {
  			Inform8Context::getLogger()->log(BaseLogger::$DEBUG, "AuthError: " . json_encode($authManager->getAuthenticationError()));
  			$output["result"] = false;
  			$output["errorCode"] = $authManager->getAuthenticationError();
			// TODO - Encode response to user
		}
  	}
  }else {
  				// TODO - Encode response to user
  	$output["result"] = false;
    $output["errorCode"] = "AU014";
  }
  if ($call=="login"){
	  echo json_encode($output);
  }
?>