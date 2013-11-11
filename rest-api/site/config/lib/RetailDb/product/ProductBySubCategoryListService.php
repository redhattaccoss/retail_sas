<?php
/**
 * Get Products per subcategory ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class ProductBySubCategoryListService extends Service{
	public static $FIELD_SUBCATEGORY_ID = "subcategoryId";
	public static $FIELD_DETAILED = "detailed";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductEncoder();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_SUBCATEGORY_ID));
	}
	
	protected function runImplementation(){
		$id = Request::getSafeGetOrPost(self::$FIELD_SUBCATEGORY_ID);
		$detailed = Request::getSafeGetOrPost(self::$FIELD_DETAILED);
		$setting = new ProductServiceSetting();
		$setting->setDetailed($detailed);
		$productSubCategories = ProductSubCategoryIQL::select()->where(ProductSubCategoryIQL::$_TABLE, ProductSubCategoryIQL::$SUBCATEGORYID, "=", $id)->get();
		$products = array();
		if (!empty($productSubCategories)){
			foreach($productSubCategories as $productSubCategory){
				/* @var $productSubCategory ProductSubCategory */
				$products[] = $productSubCategory->getProductIdAsObject();				
			}
		}	
		return $this->encoder->json_encode($products, $setting);
	}
}