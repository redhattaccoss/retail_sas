<?php
class DeliveryOptionExistChecker implements IChecker{
	public static $FIELD_DELIVERY_OPTION = "deliveryOption";
	 
	public function check(){
		$deliveryOptionId = Request::getSafeGetOrPost(self::$FIELD_DELIVERY_OPTION);
		$deliveryOption = DeliveryOptionIQL::select()
						 ->where(DeliveryOptionIQL::$_TABLE, DeliveryOptionIQL::$DELIVERYOPTIONID, "=", $deliveryOptionId)
						 ->getFirst();
		return $deliveryOption!=null;
	}
	
	public function getMessage(){
		return "";
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"Delivery option does not exist", "code"=>"deliveryoptiondoesnotexist");
		return $output;
	}	
}