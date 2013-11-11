<?php
class ProductSizeListService extends Service{
	public function __construct(){
		//parent::__construct();
		$this->encoder = new ProductSizeEncoder();
	}
	
	protected function runImplementation(){
		$productSizes = ProductSizeIQL::select()->get();
		$setting = new ProductSizeServiceSetting();
		$setting->setMode(ProductSizeServiceSetting::$MULTIPLE);
		return $this->encoder->json_encode($productSizes, $setting);
	}
	
	
	
}