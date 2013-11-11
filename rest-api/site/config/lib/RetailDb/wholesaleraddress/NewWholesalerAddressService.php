<?php
class NewWholesalerAddressService extends BaseWholesalerAddressService{
	
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ADDRESS, self::$FIELD_WHOLESALER_ID));
	}
	
	protected function runImplementation(){
		$wholesalerId = Request::getSafeGetOrPost(self::$FIELD_WHOLESALER_ID);
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$address = Request::getSafeGetOrPost(self::$FIELD_ADDRESS);
		$address2 = Request::getSafeGetOrPost(self::$FIELD_ADDRESS2);
		$city = Request::getSafeGetOrPost(self::$FIELD_CITY);
		$state = Request::getSafeGetOrPost(self::$FIELD_STATE);
		$postcode = Request::getSafeGetOrPost(self::$FIELD_POSTCODE);
		$addressCountryId = Request::getSafeGetOrPost(self::$FIELD_ADDRESS_COUNTRY_ID);
		$addressTypeId = Request::getSafeGetOrPost(self::$FIELD_ADDRESS_TYPE_ID);
		
		$newAddress = new Address();
		$newAddress->setName($name);
		$newAddress->setAddress($address);
		$newAddress->setAddress2($address2);
		$newAddress->setCity($city);
		$newAddress->setState($state);
		$newAddress->setPostCode($postcode);
		$newAddress->setAddressCountryId($addressCountryId);
		$newAddress->setAddressTypeId($addressTypeId);
		
		$dao = new AddressDao();
		$newAddress = $dao->create($newAddress);
		
		$wholesalerAddress = new WholesalerAddress();
		$wholesalerAddress->setAddressId($newAddress->getPk());
		$wholesalerAddress->setWholesalerId($wholesalerId);
		$wholesalerAddress = $this->dao->create($wholesalerAddress);
		return $this->encoder->json_passed($wholesalerAddress);
	}
}