<?php
class RetailSubCategoryListService extends Service{
	
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
	}
	
	protected function runImplementation(){
		//enabledOnly - this is not a required field so if it is not specified in the call we set its default value to 1
		$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
		
		$setting = new CategoryServiceSetting();
		$setting->setEnabledOnly($enabledOnly);
		$setting->setSubCategoriesOnly(true);
		if ($setting->getEnabledOnly()=="1"){
			$categories = SubCategoryIQL::select()->where(SubCategoryIQL::$_TABLE, SubCategoryIQL::$WHOLESALEENABLED, "=", "0")->_and(SubCategoryIQL::$_TABLE, SubCategoryIQL::$ENABLED, "=", "1")->get();
		}else{
			$categories = SubCategoryIQL::select()->where(SubCategoryIQL::$_TABLE, SubCategoryIQL::$WHOLESALEENABLED, "=", "0")->get();
		}
		return $this->encoder->json_encode($categories, $setting);
	}
}