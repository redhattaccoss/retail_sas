<?php
class GetCategoryService extends Service{
	public static $FIELD_ID = "id";
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	public static $FIELD_CATEGORIES_ONLY = "categoriesOnly";
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new CategoryDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	
	protected function runImplementation(){
		$id = Request::getSafeGetOrPost(self::$FIELD_ID);
		$category = $this->dao->get($id);
		if ($category!=null){
			//categoriesOnly - this is not a required field so if it is not specified in the call we set its default value to 1
			$categoriesOnly = Request::getSafeGetOrPost(self::$FIELD_CATEGORIES_ONLY);
			$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
			
			$setting = new CategoryServiceSetting();
			$setting->setMode(CategoryServiceSetting::$INDIVIDUAL);
			$setting->setCategoriesOnly($categoriesOnly);
			$setting->setEnabledOnly($enabledOnly);
			return $this->encoder->json_encode($category, $setting);
		}else{
			return $this->encoder->json_failed();
		}		
	}
}