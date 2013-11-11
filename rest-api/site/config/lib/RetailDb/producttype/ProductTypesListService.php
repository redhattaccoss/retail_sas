<?php
/**
 * Product Types List Service as specified in 4.2 ...
 * @author Tapion Family
 * @copyright 2011 - Inform8
 *
 */
class ProductTypesListService extends Service{
	
	public static $FIELD_ENABLED_ONLY = "enabledOnly";
	public static $FIELD_SEND_DESCRIPTION = "sendDescription";
	
	public function __construct(){
		$this->encoder = new ProductTypesEncoder();
	}
	
	/**
	 * List product types as specified in 4.2.2 ...
	 * @return Array
	 */
	protected function runImplementation(){
		//enabledOnly - this is not a required field so if it is not specified in the call we set its default value to 1
		$enabledOnly = Request::getSafeGetOrPost(self::$FIELD_ENABLED_ONLY);
		//sendDescription this is not a required field so if it is not specified in the call we set its default value to 0 which corresponds also to no as specified in the document
		$sendDescription = Request::getSafeGetOrPost(self::$FIELD_SEND_DESCRIPTION);
		
		$setting = new ProductTypeServiceSetting();
		$setting->setSendDescription($sendDescription);
		$setting->setEnabledOnly($enabledOnly);
		
		
		if ($setting->getEnabledOnly()=="1"){
			$productTypes = ProductTypeIQL::select()->where(ProductTypeIQL::$_TABLE, ProductTypeIQL::$ENABLED, "=", "1")->get();
		}else{
			$productTypes = ProductTypeIQL::select()->get();
		}
		return $this->encoder->json_encode($productTypes, $setting);
	}
}