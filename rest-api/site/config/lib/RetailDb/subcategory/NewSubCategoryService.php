<?php
class NewSubCategoryService extends Service{
	
	public static $FIELD_NAME = "name";
	public static $FIELD_SHORT_URL = "shortUrl";
	public static $FIELD_ENABLED = "enabled";
	public static $FIELD_WHOLESALE_ENABLED = "wholesaleEnabled";
	public static $FIELD_TOP_PROMO_HTML = "topPromoHtml";
	public static $FIELD_BOTTOM_PROMO_HTML = "bottomPromoHtml";
	public static $FIELD_VIEW_ORDER = "viewOrder";
	public static $FIELD_ID = "id";
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new SubCategoryDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ENABLED, self::$FIELD_SHORT_URL));
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$SHORTURL, self::$FIELD_SHORT_URL);
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$NAME, self::$FIELD_NAME);		
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
		
		$subCategory = new SubCategory();
		$subCategory->setEnabled($enabled);
		$subCategory->setWholesaleEnabled($wholesaleEnabled);
		$subCategory->setName($name);
		$subCategory->setShortUrl($shortUrl);
		$subCategory->setTopPromoHtml($topPromoHtml);
		$subCategory->setBottomPromoHtml($bottomPromoHtml);
		$subCategory->setViewOrder($viewOrder);
		$subCategory->setCategoryId($categoryId);
		try{
			$this->dao->create($subCategory);
		}catch(Exception $e){
			
		}
		return $this->encoder->json_passed();		
	}
}