<?php
/**
 * Encoder for Services under ProductType package results ...
 * @author Tapion Family
 * @copyright 2011 - Inform8
 *
 */
class ProductTypesEncoder extends Encoder{
	
	public function json_encode($result, Setting $otherSetting = null){
		$this->setting = $otherSetting;
		if ($otherSetting->getMode()==Setting::$INDIVIDUAL){
			return $this->renderIndividualProductType($result);
		}else{
			return $this->renderProductTypes($result);
		}
	}
	
	private function renderProductTypes($result){
		$this->output = array();
		if (!empty($result)){
			foreach($result as $productType){
				/* @var $productType ProductType */				
				$this->output["producttypes"][] = $this->renderIndividualProductType($productType);
			}
		}
		return $this->output;
	}
	
	private function renderIndividualProductType($productType){
		$type = array();
		if ($productType!=null){
			$type["id"] = $productType->getPk();
			$type["enabled"] = $productType->getEnabled();
			$type["name"] = $productType->getName();
			$type["code"] = $productType->getCode();
			if ($this->setting->getSendDescription()=="1"){
				$type["description"] = $productType->getDescription();
			}
		}
		return $type;
	}
}