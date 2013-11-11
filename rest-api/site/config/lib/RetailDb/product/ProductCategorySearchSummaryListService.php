<?php
/**
 * Enter description here ...
 * @author Tapion Family
 *
 */
class ProductCategorySearchSummaryListService extends Service{
	protected function runImplementation(){
		$categoryId = Request::getSafeGetOrPost("categoryId");
		$detailed = Request::getSafeGetOrPost("detailed");
		$setting = new ProductServiceSetting();
		$setting->setDetailed($detailed);
		
		//$products = ProductIQL::select()->where(ProductIQL::$_TABLE, ProductIQL::)
	}
	
	
}