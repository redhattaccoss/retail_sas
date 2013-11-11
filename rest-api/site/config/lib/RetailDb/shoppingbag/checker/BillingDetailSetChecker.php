<?php
class BillingDetailSetChecker implements IChecker{
	public function check(){
		$billingAddress = ShoppingBag::getInstance()->getBillingAddress();
		$deliveryAddress = ShoppingBag::getInstance()->getDeliveryAddress();
		$deliveryOption = ShoppingBag::getInstance()->getDeliveryOption();
		return $billingAddress!=null&&$deliveryAddress!=null&$deliveryOption!=null;
	}
	
	public function getMessage(){
		return "";
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"Billing details are not yet set", "code"=>"billingdetailset");
		return $output;
	}
}