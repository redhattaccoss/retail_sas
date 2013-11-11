<?php

	$HostName = 	"localhost";
	$DBName = 		"retaildb";
	$DBUsername = 	"root";
	$DBPassword = 	"root";	
	
	$mysqli = new mysqli($HostName, $DBUsername, $DBPassword, $DBName);
	if ($mysqli->connect_error) {
	  include 'config/includes/sitedown.php';
	  die();
	}
	
	Inform8Context::setDbConnection($mysqli);	
?>