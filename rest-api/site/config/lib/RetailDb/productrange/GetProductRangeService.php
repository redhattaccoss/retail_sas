<?php
class GetProductRangeService extends Service{
	public static $FIELD_ID = "id";
	public static $FIELD_SEND_DESCRIPTION = "sendDescription";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
		$this->dao = new ProductRangeDao();
		$this->encoder = new ProductRangeEncoder();
	}
	
	protected function runImplementation(){
		$productRange = $this->dao->get(Request::getOrPost(self::$FIELD_ID));
		$setting = new ProductRangeServiceSetting();
		$setting->setMode(ProductRangeServiceSetting::$INDIVIDUAL);	
		$setting->setSendDescription(Request::getSafeGetOrPost(self::$FIELD_SEND_DESCRIPTION));
		return $this->encoder->json_encode($productRange, $setting);
	}
}