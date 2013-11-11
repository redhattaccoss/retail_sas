<?php
interface IChecker{
	/**
	 * Function to be used in checking ...
	 */
	public function check();
	/**
	 * Function to be used in getting error message ...
	 */
	public function getMessage();
	
	/**
	 * Function to be used in getting result in json_format ...
	 */
	public function json_result();
}