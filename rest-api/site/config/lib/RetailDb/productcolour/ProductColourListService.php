<?php
/**
 * Retrieves a list of product colours ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class ProductColourListService extends Service{
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductColourEncoder();
	}
	
	protected function runImplementation(){
		$productColours = ProductColourIQL::select()->get();
		$setting = new ProductColourServiceSetting();
		$setting->setMode(ProductColourServiceSetting::$MULTIPLE);
		return $this->encoder->json_encode($productColours, $setting);
	}
	
}