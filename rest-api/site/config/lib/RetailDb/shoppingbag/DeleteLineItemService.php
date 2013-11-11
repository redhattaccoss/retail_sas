<?php
/**
 * Removes an item from the shopping bag...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class DeleteLineItemService extends BaseLineItemService{
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_PRODUCT_OPTION_ID));
		$this->validators[] = new ProductOptionExistChecker(Request::getSafeGetOrPost(self::$FIELD_PRODUCT_OPTION_ID));
	}

	protected function runImplementation(){
		ShoppingBag::getInstance()->removeProductOption(Request::getSafeGetOrPost(self::$FIELD_PRODUCT_OPTION_ID));
		$setting = new ShoppingBagServiceSetting();
		$setting->setMode(ShoppingBagServiceSetting::$ITEMS_ONLY);
		return $this->encoder->json_encode(null, $setting);
	}
}