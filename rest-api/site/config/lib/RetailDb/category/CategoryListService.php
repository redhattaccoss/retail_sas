<?php
/**
 * List all Categories as defined in 4.3.2 ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class CategoryListService extends Service{

	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	public static $FIELD_CATEGORIES_ONLY = "categoriesOnly";
	public static $FIELD_TREE_VIEW = "treeView";
	
	public function __construct($categoriesOnly=null, $enabledOnly=null){
		parent::__construct();
		if (($categoriesOnly!=null)&&($enabledOnly!=null)){
			$this->setting = new CategoryServiceSetting();
			$this->setting->setEnabledOnly($enabledOnly);
			$this->setting->setCategoriesOnly($categoriesOnly);
		}
		$this->encoder = new CategoryEncoder();
	}
	
	protected function runImplementation(){
		//enabledOnly - this is not a required field so if it is not specified in the call we set its default value to 1
		$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
		//categoriesOnly - this is not a required field so if it is not specified in the call we set its default value to 1
		$categoriesOnly = Request::getSafeGetOrPost(self::$FIELD_CATEGORIES_ONLY);
		// if setting is not predefined on constructor
		if ($this->setting==null){
			$setting = new CategoryServiceSetting();
			$setting->setEnabledOnly($enabledOnly);
			$setting->setCategoriesOnly($categoriesOnly);
		}else{
		//otherwise
			$setting = $this->setting;
		}
		$treeView = Request::getSafeGetOrPost(self::$FIELD_TREE_VIEW);
		$setting->setTreeView($treeView);
		
		//if enabledOnly
		if ($setting->getEnabledOnly()=="1"){
			$categories = CategoryIQL::select()->where(CategoryIQL::$_TABLE, CategoryIQL::$ENABLED, "=", "1")->get();
		}else{
			$categories = CategoryIQL::select()->get();
		}
		return $this->encoder->json_encode($categories, $setting);	
	}	
}