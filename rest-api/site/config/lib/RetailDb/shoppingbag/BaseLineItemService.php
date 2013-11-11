<?php
/**
 * Base Line Item Service ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
abstract class BaseLineItemService extends Service{
	public static $FIELD_QUANTITY = "quantity";
	public static $FIELD_PRODUCT_OPTION_ID = "productOptionId";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ShoppingBagEncoder(); 		
	}
}