<?php
class GetSubCategoryService extends Service{
	public static $FIELD_ID = "id";
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new SubCategoryDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		
		$id = Request::getSafeGetOrPost(self::$FIELD_ID);
		$subCategory = $this->dao->get($id);
		if ($subCategory!=null){
			//enabledOnly - this is not a required field so if it is not specified in the call we set its default value to 1
			$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
			$setting = new CategoryServiceSetting();
			$setting->setEnabledOnly($enabledOnly);
			$setting->setMode(CategoryServiceSetting::$INDIVIDUAL);
			$setting->setSubCategoriesOnly(true);
			return $this->encoder->json_encode($subCategory, $setting);
		}else{
			return $this->encoder->json_failed();
		}		
	}	
}