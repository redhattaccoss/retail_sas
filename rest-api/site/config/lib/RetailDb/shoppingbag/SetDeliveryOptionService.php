<?php
/**
 * Sets for Delivery Option Service ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class SetDeliveryOptionService extends BaseLineItemService{
	
	public static $FIELD_DELIVERY_OPTION = "deliveryOption";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_DELIVERY_OPTION));
		$this->validators[] = new DeliveryOptionExistChecker();
	}
	
	protected function runImplementation(){
		$deliveryOptionId = Request::getSafeGetOrPost(self::$FIELD_DELIVERY_OPTION);			
		$deliveryOption = DeliveryOptionIQL::select()->where(DeliveryOptionIQL::$_TABLE, DeliveryOptionIQL::$DELIVERYOPTIONID, "=", $deliveryOptionId)->getFirst();
		ShoppingBag::getInstance()->setDeliveryOption($deliveryOption);
		return $this->encoder->json_passed();		
	}
	
}