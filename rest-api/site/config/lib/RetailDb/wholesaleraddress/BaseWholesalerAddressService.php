<?php
abstract class BaseWholesalerAddressService extends Service{
	public static $FIELD_WHOLESALER_ID = "wholesalerId";	
	public static $FIELD_NAME = "name";
	public static $FIELD_ADDRESS = "address";
	public static $FIELD_ADDRESS2 = "address2";
	public static $FIELD_CITY = "city";
	public static $FIELD_STATE = "state";
	public static $FIELD_POSTCODE = "postcode";
	public static $FIELD_ADDRESS_COUNTRY_ID = "addressCountryId";
	public static $FIELD_ADDRESS_TYPE_ID = "addressTypeId";
	public static $FIELD_DESCRIPTION = "description";
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new WholesalerAddressEncoder();
		$this->dao = new WholesalerAddressDao();
	}
}