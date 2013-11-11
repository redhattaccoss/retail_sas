<?php
class EnableDisableWholesaleSubCategoryService extends Service{
	public static $FIELD_ENABLE = "enable";
	public static $FIELD_NAME = "name";
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new SubCategoryDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ENABLE, self::$FIELD_NAME));
	}
	
	protected function runImplementation(){
		//enable - the value to be used in setting a category in retail
		$enable = Request::getSafeGetOrPost(self::$FIELD_ENABLE);
		//name of the category
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		if ((trim($enable)!="")&&(trim($name)!="")){
			$subCategory = SubCategoryIQL::select()->where(SubCategoryIQL::$_TABLE, SubCategoryIQL::$NAME, "=", trim($name))->_and(SubCategoryIQL::$_TABLE, SubCategoryIQL::$WHOLESALEENABLED, "=", "1")->getFirst();
			/* @var $category Category */
			if ($subCategory!=null){
				$subCategory->setEnabled($enable);
				$this->dao->save($subCategory);
				return $this->encoder->json_passed();
			}else{
				return $this->encoder->json_failed();
			}
		}else{
			return $this->encoder->json_failed();
		}
	}
}