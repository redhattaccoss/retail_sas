<?php
class WholesalerListService extends BaseWholesalerService{
	public static $FIELD_DETAILED = "detailed";
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	
	public function __construct(){
		parent::__construct();
	}
	protected function runImplementation(){
		$setting = new WholesalerSetting();
		$detailed = Request::getSafeGetOrPost(self::$FIELD_DETAILED);
		$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
		$setting->setDetailed($detailed);
		$setting->setEnabledOnly($enabledOnly);
		if ($setting->getEnabledOnly()=="1"){
			$wholesalers = WholesalerIQL::select()->where(WholesalerIQL::$_TABLE, WholesalerIQL::$ENABLED, "=", "1")->get();
		}else{
			$wholesalers = WholesalerIQL::select()->get();
		}
		return $this->encoder->json_encode($wholesalers, $setting);
	}
}