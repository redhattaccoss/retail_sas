<?php
class WholesalerAddressListService extends BaseWholesalerAddressService{
	
	public static $FIELD_SEND_DESCRIPTION = "sendDescription";

	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_WHOLESALER_ID));
	}
	
	protected function runImplementation(){
		$wholesalerId = Request::getSafeGetOrPost(self::$FIELD_WHOLESALER_ID);
		$wholesalerAddresses = WholesalerAddressIQL::select()->where(WholesalerAddressIQL::$_TABLE, WholesalerAddressIQL::$WHOLESALERID, "=", $wholesalerId)->get();
		$setting = new WholesalerAddressServiceSetting();
		$setting->setSendDescription(Request::getSafeGetOrPost(self::$FIELD_SEND_DESCRIPTION));
		return $this->encoder->json_encode($wholesalerAddresses, $setting);
	}
}