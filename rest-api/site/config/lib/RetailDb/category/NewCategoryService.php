<?php
/**
 * New Category Service ...
 * @author Tapion Family
 * @RestService("NewCategoryService")
 * 
 */
class NewCategoryService extends Service{
	
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
		$this->dao = new CategoryDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME, self::$FIELD_SHORT_URL));
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$SHORTURL, self::$FIELD_SHORT_URL);
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$NAME, self::$FIELD_NAME);
		
	}
	
	public function runImplementation(){
		$enabled = Request::getSafeGetOrPost(self::$FIELD_ENABLED);
		$wholesaleEnabled = Request::getSafeGetOrPost(self::$FIELD_WHOLESALE_ENABLED);
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$shortUrl = Request::getSafeGetOrPost(self::$FIELD_SHORT_URL);
		$topPromoHtml = Request::getSafeGetOrPost(self::$FIELD_TOP_PROMO_HTML);
		$bottomPromoHtml = Request::getSafeGetOrPost(self::$FIELD_BOTTOM_PROMO_HTML);
		$viewOrder = Request::getSafeGetOrPost(self::$FIELD_VIEW_ORDER);
		$id = Request::getSafeGetOrPost(self::$FIELD_ID);
		$category = new Category();
		if (trim($id)!=""){
			$category->setCategoryId($id);
		}
		
		if ($enabled==""){
			$category->setEnabled("0");
		}else{
			$category->setEnabled($enabled);
		}
		if ($wholesaleEnabled==""){
			$category->setWholesaleEnabled("0");			
		}else{
			$category->setWholesaleEnabled($wholesaleEnabled);
		}
		
		$category->setName($name);
		$category->setShortUrl($shortUrl);
		$category->setTopPromoHtml($topPromoHtml);
		$category->setBottomPromoHtml($bottomPromoHtml);
		$category->setViewOrder($viewOrder);
		$category = $this->dao->create($category);
		return $this->encoder->json_passed($category);
	}
}