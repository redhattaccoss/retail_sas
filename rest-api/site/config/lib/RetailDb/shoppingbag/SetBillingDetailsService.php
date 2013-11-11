<?php
/**
 * Sets for Billing Details of a Shopping Bag ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 */
class SetBillingDetailsService extends BaseLineItemService{
	
	public static $FIELD_BILLING_ADDRESS = "billingAddress";
	public static $FIELD_DELIVERY_ADDRESS = "deliveryAddress";
	public static $FIELD_DELIVERY_OPTION = "deliveryOption";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_BILLING_ADDRESS, self::$FIELD_DELIVERY_ADDRESS, self::$FIELD_DELIVERY_OPTION));
		$this->validators[] = new BillingAddressExistChecker();
		$this->validators[] = new DeliveryAddressExistChecker();
		$this->validators[] = new DeliveryOptionExistChecker();
		
	}
	
	
	protected function runImplementation(){
		
		//gets the user from Session
		$wholesaler = Session::getInstance()->getAuthenticationManager()->getUser();
	
		//set Checkout details
		$billingAddressId = Request::getSafeGetOrPost(self::$FIELD_BILLING_ADDRESS);
		$deliveryAddressId = Request::getSafeGetOrPost(self::$FIELD_DELIVERY_ADDRESS);
		$deliveryOptionId = Request::getSafeGetOrPost(self::$FIELD_DELIVERY_OPTION);
		
		//finds for specific object in db
		$billingAddress = WholesalerAddressIQL::select()
						  ->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$ADDRESSID, "=", $billingAddressId)
						  ->_and(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesaler->getPk())
						  ->getFirst();
		$deliveryAddress = WholesalerAddressIQL::select()
							->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$ADDRESSID, "=", $deliveryAddressId)
							->_and(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesaler->getPk())
							->getFirst();
		$deliveryOption = DeliveryOptionIQL::select()->where(DeliveryOptionIQL::$_TABLE, DeliveryOptionIQL::$DELIVERYOPTIONID, "=", $deliveryOptionId)->getFirst();
				
		//set checkout details
		ShoppingBag::getInstance()->setBillingAddress($billingAddress);
		ShoppingBag::getInstance()->setDeliveryAddress($deliveryAddress);
		ShoppingBag::getInstance()->setDeliveryOption($deliveryOption);
		
		//return a success
		return $this->encoder->json_passed();
	}
}