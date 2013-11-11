<?php
class UpdateSubCategoryService extends Service{
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new SubCategoryDao();
		$this->validators[] = new RequiredChecker(array("name", "shortUrl"));
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$SHORTURL, "shortUrl", Request::getSafeGetOrPost("id"));
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$NAME, "name", Request::getSafeGetOrPost("id"));
	}
	
	protected function runImplementation(){
		//get input from request
		$enabled = Request::getSafeGetOrPost("enabled");
		$wholesaleEnabled = Request::getSafeGetOrPost("wholesaleEnabled");
		$name = Request::getSafeGetOrPost("name");
		$shortUrl = Request::getSafeGetOrPost("shortUrl");
		$topPromoHtml = Request::getSafeGetOrPost("topPromoHtml");
		$bottomPromoHtml = Request::getSafeGetOrPost("bottomPromoHtml");
		$viewOrder = Request::getSafeGetOrPost("viewOrder");
		$categoryId = Request::getSafeGetOrPost("categoryId");
		
		$subCategory = $this->dao->get(Request::getSafeGetOrPost("id"));
		$subCategory->setEnabled($enabled);
		$subCategory->setWholesaleEnabled($wholesaleEnabled);
		$subCategory->setName($name);
		$subCategory->setShortUrl($shortUrl);
		$subCategory->setTopPromoHtml($topPromoHtml);
		$subCategory->setBottomPromoHtml($bottomPromoHtml);
		$subCategory->setViewOrder($viewOrder);
		$subCategory->setCategoryId($categoryId);
		
		$this->dao->save($subCategory);
		
		return $this->encoder->json_passed();		
	}
}