<?php
class ProductRangeListService extends Service{
	public static $FIELD_SEND_DESCRIPTION = "sendDescription";
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductRangeEncoder();
	}
	
	protected function runImplementation(){
		$productRanges = ProductRangeIQL::select()->get();
		$setting = new ProductRangeServiceSetting();
		$setting->setMode(ProductRangeServiceSetting::$MULTIPLE);
		$setting->setSendDescription(Request::getSafeGetOrPost(self::$FIELD_SEND_DESCRIPTION));
		return $this->encoder->json_encode($productRanges, $setting);
	}
}