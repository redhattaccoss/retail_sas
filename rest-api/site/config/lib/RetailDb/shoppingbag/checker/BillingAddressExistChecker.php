<?php
class BillingAddressExistChecker implements IChecker{
	public static $FIELD_BILLING_ADDRESS = "billingAddress";
	
	public function check(){
		$wholesaler = Session::getInstance()->getAuthenticationManager()->getUser();
		$billingAddressId = Request::getSafeGetOrPost(self::$FIELD_BILLING_ADDRESS);
		$billingAddress = WholesalerAddressIQL::select()
						  ->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$ADDRESSID, "=", $billingAddressId)
						  ->_and(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesaler->getPk())
						  ->getFirst();
		return $billingAddress!=null;
	}
	
	public function getMessage(){
		return "";
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"Billing address does not exist", "code"=>"billingaddressnoexist");
		return $output;
	}	
}