<?php
/**
 * Copyright 2011 - Inform8
 * http://www.inform8.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * http://www.apache.org/licenses/LICENSE-2.0
 */
 
  require_once 'config/settings.php';
  
  $call = Request::getSafeGetOrPost("call");
  
  //call for service factory
  $service = ServiceFactory::getService($call);
  $result = array();
  if ($service!=null){
  	$result = $service->run();
  }
  echo json_encode($result);
?>