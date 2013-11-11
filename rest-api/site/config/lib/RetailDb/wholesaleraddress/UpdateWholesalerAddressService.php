<?php
class UpdateWholesalerAddressService extends BaseWholesalerAddressService{
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ADDRESS_ID, self::$FIELD_WHOLESALER_ID, self::$FIELD_ID));
	}	
	
	protected function runImplementation(){
		$addressId = Request::getSafeGetOrPost(self::$FIELD_ADDRESS_ID);
		$wholesalerId = Request::getSafeGetOrPost(self::$FIELD_WHOLESALER_ID);
		$wholesalerAddress = $this->dao->get(Request::getSafeGetOrPost(self::$FIELD_ID));
		$wholesalerAddress->setAddressId($addressId);
		$wholesalerAddress->setWholesalerId($wholesalerId);
		$wholesalerAddress = $this->dao->save($wholesalerAddress);
		return $this->encoder->json_passed($wholesalerAddress);
	}
	
}