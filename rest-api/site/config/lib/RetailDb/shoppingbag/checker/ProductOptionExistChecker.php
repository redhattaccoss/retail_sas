<?php
class ProductOptionExistChecker implements IChecker{
	private $id;
	
	public function __construct($id){
		$this->id = $id;
	}
	
	public function check(){
		$items = ShoppingBag::getInstance()->getItems();
		if (!empty($items)){
			foreach($items as $item){
				/* @var $item LineItem */
				if ($item->getProductOption()->getPk()==$this->id){
					return true;
				}
			}
			return false;
		}
		return false;
	}
	public function getMessage(){
		return "";	
	}
	
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"Product option {$this->id} is not on the shopping bag.", "code"=>"shoppingexist");
		
		return $output;
	}
}