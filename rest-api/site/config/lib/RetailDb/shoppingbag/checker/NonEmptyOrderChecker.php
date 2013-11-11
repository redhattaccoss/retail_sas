<?php
class NonEmptyOrderChecker implements IChecker{
	public function check(){
		$items = ShoppingBag::getInstance()->getItems();
		return (!empty($items));
	}
	
	public function getMessage(){
		return "";
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"Order should have at least one order item", "code"=>"nonemptyorder");
		return $output;
	}
}