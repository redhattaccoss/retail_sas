<?php
class GetWholesalerService extends BaseWholesalerService{
	public static $FIELD_DETAILED = "detailed";
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	public static $FIELD_ID = "id";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$wholesaler = $this->dao->get(Request::getSafeGetOrPost(self::$FIELD_ID));
		$setting = new WholesalerSetting();
		$detailed = Request::getSafeGetOrPost(self::$FIELD_DETAILED);
		$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
		$setting->setDetailed($detailed);
		$setting->setEnabledOnly($enabledOnly);
		$setting->setMode(Setting::$INDIVIDUAL);
		return $this->encoder->json_encode($wholesaler, $setting);		
	}
}