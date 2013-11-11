<?php
class ListLineItemsService extends BaseLineItemService{
	public function __construct(){
		parent::__construct();
	}	
	
	protected function runImplementation(){
		$setting = new ShoppingBagServiceSetting();
		$setting->setMode(ShoppingBagServiceSetting::$ALL);
		return $this->encoder->json_encode(null, $setting);
	}
}