<?php
/**
 * Update Category Service ...
 * @author Tapion Family
 * @copyright 2011 - Inform8
 *
 */
class UpdateCategoryService extends Service{
	
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
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME, self::$FIELD_SHORT_URL, self::$FIELD_ID));
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$SHORTURL, self::$FIELD_SHORT_URL, Request::getSafeGetOrPost(self::$FIELD_ID));
		$this->validators[] = new IndexChecker(CategoryIQL::$_TABLE, CategoryIQL::$NAME, self::$FIELD_NAME, Request::getSafeGetOrPost(self::$FIELD_ID));
	}
	
	public function runImplementation(){
		$enabled = Request::getSafeGetOrPost(self::$FIELD_ENABLED);
		$wholesaleEnabled = Request::getSafeGetOrPost(self::$FIELD_WHOLESALE_ENABLED);
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$shortUrl = Request::getSafeGetOrPost(self::$FIELD_SHORT_URL);
		$topPromoHtml = Request::getSafeGetOrPost(self::$FIELD_TOP_PROMO_HTML);
		$bottomPromoHtml = Request::getSafeGetOrPost(self::$FIELD_BOTTOM_PROMO_HTML);
		$viewOrder = Request::getSafeGetOrPost(self::$FIELD_VIEW_ORDER);
		$category = $this->dao->get(Request::getSafeGetOrPost(self::$FIELD_ID));
		$category->setEnabled($enabled);
		$category->setWholesaleEnabled($wholesaleEnabled);
		$category->setName($name);
		$category->setShortUrl($shortUrl);
		$category->setTopPromoHtml($topPromoHtml);
		$category->setBottomPromoHtml($bottomPromoHtml);
		$category->setViewOrder($viewOrder);
		$category = $this->dao->save($category);
		return $this->encoder->json_passed($category);
	}
}