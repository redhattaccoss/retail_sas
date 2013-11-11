<?php
class GetProductService extends Service{
	public static $FIELD_ID = "id";
	public static $FIELD_DETAILED = "detailed";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductEncoder();
		$this->dao = new ProductDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$id = Request::getSafeGetOrPost(self::$FIELD_ID);
		$detailed = Request::getSafeGetOrPost(self::$FIELD_DETAILED);
		$setting = new ProductServiceSetting();
		if ($detailed==""){
			$setting->setDetailed("1");
		}else{
			$setting->setDetailed($detailed);
		}
		$setting->setMode(Setting::$INDIVIDUAL);
		$product = $this->dao->get($id);
		
		return $this->encoder->json_encode($product, $setting);
	}
}