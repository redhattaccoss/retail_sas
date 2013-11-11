<?php
class WholesalerAddressServiceSetting extends Setting{
	/**
	 * Send Description - Send description data back 
	 * @defined - 3.2.2
	 */
	private $sendDescription = "0";

	/**
	 * Get Send Description field's value ...
	 */
	public function getSendDescription(){
		return $this->sendDescription;
	}
	
	public function setSendDescription($sendDescription){
		if (trim($sendDescription)!=""){
			$this->sendDescription = $sendDescription;
		}
	}
	
}