<?php
/**
 * Sets for Delivery Address ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class SetDeliveryAddressService extends BaseLineItemService{
	
	public static $FIELD_DELIVERY_ADDRESS = "deliveryAddress";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_DELIVERY_ADDRESS));
		$this->validators[] = new DeliveryAddressExistChecker();
	}
	
	protected function runImplementation(){
		$wholesaler = Session::getInstance()->getAuthenticationManager()->getUser();
		$deliveryAddressId = Request::getSafeGetOrPost(self::$FIELD_DELIVERY_ADDRESS);			
		$deliveryAddress = WholesalerAddressIQL::select()
							->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$ADDRESSID, "=", $deliveryAddressId)
							->_and(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesaler->getPk())
							->getFirst();
		ShoppingBag::getInstance()->setDeliveryAddress($deliveryAddress);
		return $this->encoder->json_passed();		
	}
}