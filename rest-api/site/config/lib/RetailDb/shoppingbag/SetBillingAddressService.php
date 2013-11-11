<?php
/**
 * Sets for a billing address of a user ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 */
class SetBillingAddressService extends BaseLineItemService{
	
	public static $FIELD_BILLING_ADDRESS = "billingAddress";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_BILLING_ADDRESS));
		$this->validators[] = new BillingAddressExistChecker();
	}
	
	protected function runImplementation(){
		$wholesaler = Session::getInstance()->getAuthenticationManager()->getUser();
		$billingAddressId = Request::getSafeGetOrPost(self::$FIELD_BILLING_ADDRESS);
		$billingAddress = WholesalerAddressIQL::select()
						  ->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$ADDRESSID, "=", $billingAddressId)
						  ->_and(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesaler->getPk())
						  ->getFirst();
		ShoppingBag::getInstance()->setBillingAddress($billingAddress);
		
		return $this->encoder->json_passed();
	}
}