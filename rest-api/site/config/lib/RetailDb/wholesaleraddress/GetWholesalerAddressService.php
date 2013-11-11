<?php
class GetWholesalerAddressService extends BaseWholesalerAddressService{
	public static $FIELD_ID = "id";
	public static $FIELD_SEND_DESCRIPTION = "sendDescription";
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$wholesalerAddress = $this->dao->get(Request::getSafeGetOrPost(self::$FIELD_ID));
		$setting = new WholesalerAddressServiceSetting();
		$setting->setMode(Setting::$INDIVIDUAL);
		$setting->setSendDescription(Request::getSafeGetOrPost(self::$FIELD_SEND_DESCRIPTION));
		return $this->encoder->json_encode($wholesalerAddress, $setting);
	}
}