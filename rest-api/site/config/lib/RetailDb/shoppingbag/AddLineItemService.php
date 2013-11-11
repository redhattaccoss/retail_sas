<?php
/**
 * Service responsible for adding line item to session Shopping Bag ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class AddLineItemService extends BaseLineItemService{
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_QUANTITY, self::$FIELD_PRODUCT_OPTION_ID));		
		$this->validators[] = new QuantityChecker(self::$FIELD_QUANTITY);
	}
	
	protected function runImplementation(){
		$quantity = intval(Request::getSafeGetOrPost(self::$FIELD_QUANTITY));
		$productOption = ProductOptionIQL::select()->where(ProductOptionIQL::$_TABLE, ProductOptionIQL::$PRODUCTOPTIONID, "=", Request::getSafeGetOrPost(self::$FIELD_PRODUCT_OPTION_ID))->getFirst();
		if ($productOption!=null){
			ShoppingBag::getInstance()->addProductOption($productOption, $quantity);
			$setting = new ShoppingBagServiceSetting();
			$setting->setMode(ShoppingBagServiceSetting::$ITEMS_ONLY);
			return $this->encoder->json_encode(null, $setting);
		}else{
			return $this->encoder->json_failed();
		}
		
	}
	
}