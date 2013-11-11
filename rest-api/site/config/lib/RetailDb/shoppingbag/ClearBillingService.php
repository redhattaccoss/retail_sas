<?php
/**
 * Clear billing details service ...
 * @author Allanaire Tapion
 *
 */
class ClearBillingService extends BaseLineItemService{
	public function __construct(){
		parent::__construct();
	}
	
	protected function runImplementation(){
		ShoppingBag::getInstance()->setBillingAddress(null);
		ShoppingBag::getInstance()->setDeliveryAddress(null);
		ShoppingBag::getInstance()->setDeliveryOption(null);	
		return $this->encoder->json_passed();
	}
}