<?php
class GetProductColourService extends Service{
	public static $FIELD_ID = "id";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
		$this->dao = new ProductColourDao();
		$this->encoder = new ProductColourEncoder();
	}
	
	protected function runImplementation(){
		$productColour = $this->dao->get(Request::getOrPost(self::$FIELD_ID));
		$setting = new ProductColourServiceSetting();
		$setting->setMode(ProductColourServiceSetting::$INDIVIDUAL);	
		return $this->encoder->json_encode($productColour, $setting);
	}
}