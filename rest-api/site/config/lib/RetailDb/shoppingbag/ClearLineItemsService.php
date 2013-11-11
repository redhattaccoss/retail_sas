<?php
/**
 * Clear line items service. This is called when the user wants to clear his shopping bag
 * ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 */
class ClearLineItemsService extends BaseLineItemService{
	public function __construct(){
		parent::__construct();		
	}
	
	protected function runImplementation(){
		ShoppingBag::getInstance()->clear();
		return $this->encoder->json_passed();
	}
}