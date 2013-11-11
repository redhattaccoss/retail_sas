<?php
class DeliveryAddressExistChecker implements IChecker{
	public static $FIELD_DELIVERY_ADDRESS = "deliveryAddress";
	
	public function check(){
		$wholesaler = Session::getInstance()->getAuthenticationManager()->getUser();
		$deliveryAddressId = Request::getSafeGetOrPost(self::$FIELD_DELIVERY_ADDRESS);
		$deliveryAddress = WholesalerAddressIQL::select()
							->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$ADDRESSID, "=", $deliveryAddressId)
							->_and(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesaler->getPk())
							->getFirst();
		return $deliveryAddress!=null;
	}
	
	public function getMessage(){
		return "";
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"Delivery address does not exist", "code"=>"deliveryaddressdoesnotexist");
		return $output;
	}	
	
}