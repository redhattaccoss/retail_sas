<?php
class GetProductSizeService extends Service{
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductSizeEncoder();
		$this->dao = new ProductSizeDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	protected function runImplementation(){
		$productSize = $this->dao->get(Request::getOrPost(self::$FIELD_ID));
		$setting = new ProductSizeServiceSetting();
		$setting->setMode(ProductSizeServiceSetting::$INDIVIDUAL);	
		return $this->encoder->json_encode($productSize, $setting);
	}
}
	