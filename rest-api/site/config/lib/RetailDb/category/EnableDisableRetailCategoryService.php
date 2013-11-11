<?php
/**
 * Enable/Disable Retail Categories ...
 * @author Tapion Family
 *
 */
class EnableDisableRetailCategoryService extends Service{
	public static $FIELD_ENABLE = "enable";
	public static $FIELD_NAME = "name";
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new CategoryDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ENABLE, self::$FIELD_NAME));
	}
	
	protected function runImplementation(){
		//enable - the value to be used in setting a category in retail
		$enable = Request::getSafeGetOrPost(self::$FIELD_ENABLE);
		//name of the category
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		if ((trim($enable)!="")&&(trim($name)!="")){
			$category = CategoryIQL::select()->where(CategoryIQL::$_TABLE, CategoryIQL::$NAME, "=", trim($name))->_and(CategoryIQL::$_TABLE, CategoryIQL::$WHOLESALEENABLED, "=", "0")->getFirst();
			/* @var $category Category */
			if ($category!=null){
				$category->setEnabled($enable);
				$this->dao->save($category);
				return $this->encoder->json_passed();
			}else{
				return $this->encoder->json_failed();
			}
		}else{
			return $this->encoder->json_failed();
		}
	}
}