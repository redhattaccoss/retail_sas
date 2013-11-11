<?php
/**
 * Updates a line item's quantity ...
 * @author Allanaire Tapion
 *
 */
class UpdateLineItemService extends BaseLineItemService{

	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_QUANTITY, self::$FIELD_PRODUCT_OPTION_ID));		
		$this->validators[] = new QuantityChecker(self::$FIELD_QUANTITY);	
		$this->validators[] = new ProductOptionExistChecker(Request::getSafeGetOrPost(self::$FIELD_PRODUCT_OPTION_ID));
	}
	
	protected function runImplementation(){
		$quantity = intval(Request::getSafeGetOrPost(self::$FIELD_QUANTITY));
		$productOption = ProductOptionIQL::select()->where(ProductOptionIQL::$_TABLE, ProductOptionIQL::$PRODUCTOPTIONID, "=", Request::getSafeGetOrPost(self::$FIELD_PRODUCT_OPTION_ID))->getFirst();
		ShoppingBag::getInstance()->setQuantity($productOption->getPk(), $quantity);
		$setting = new ShoppingBagServiceSetting();
		$setting->setMode(ShoppingBagServiceSetting::$ITEMS_ONLY);
		return $this->encoder->json_encode(null, $setting);
	}
	
	
	
}