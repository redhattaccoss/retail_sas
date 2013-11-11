<?php
/**
 * Gets a detail about a specific line item using the id of a product option ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class GetLineItemService extends BaseLineItemService{
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_PRODUCT_OPTION_ID));
	}
	
	protected function runImplementation(){
		$items = ShoppingBag::getInstance()->getItems();
		$productOptionId = Request::getSafeGetOrPost(self::$FIELD_PRODUCT_OPTION_ID);
		if (!empty($items)){
			//loops over every item
			foreach($items as $item){
				/* @var $item LineItem */
				//if product option id is found then return an associate array encoded copy of the line item
				if ($item->getProductOption()->getPk()==$productOptionId){
					return $this->encoder->json_encode($item);	
				}
			}
			//throw a json failed response
			return $this->encoder->json_failed();
		}else{
			//throw a json failed response
			return $this->encoder->json_failed();
		}
	}
}