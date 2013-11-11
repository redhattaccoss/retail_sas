<?php

	$HostName = 	"localhost";
	$DBName = 		"retailsas";
	$DBUsername = 	"root";
	$DBPassword = 	"";	
	
	$mysqli = new mysqli($HostName, $DBUsername, $DBPassword, $DBName);
	if ($mysqli->connect_error) {
	  include 'config/includes/sitedown.php';
	  die();
	}
	
	Inform8Context::setDbConnection($mysqli);	
?>