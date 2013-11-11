<?php
/**
 * Retrieves for Wholesale Enabled Categories as defined in 4.3.2 ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class WholesaleCategoryListService extends Service{
	
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	public static $FIELD_CATEGORIES_ONLY = "categoriesOnly";
	
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
	}
	
	protected function runImplementation(){
		//enabledOnly - this is not a required field so if it is not specified in the call we set its default value to 1
		$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
		//categoriesOnly - this is not a required field so if it is not specified in the call we set its default value to 1
		$categoriesOnly = Request::getSafeGetOrPost(self::$FIELD_CATEGORIES_ONLY);
		
		$setting = new CategoryServiceSetting();
		$setting->setEnabledOnly($enabledOnly);
		$setting->setCategoriesOnly($categoriesOnly);		
		if ($setting->getEnabledOnly()=="1"){
			$categories = CategoryIQL::select()->where(CategoryIQL::$_TABLE, CategoryIQL::$WHOLESALEENABLED, "=", "1")->_and(CategoryIQL::$_TABLE, CategoryIQL::$ENABLED, "=", "1")->get();
		}else{
			$categories = CategoryIQL::select()->where(CategoryIQL::$_TABLE, CategoryIQL::$WHOLESALEENABLED, "=", "1")->get();			
		}
		return $this->encoder->json_encode($categories, $setting);
	}
}