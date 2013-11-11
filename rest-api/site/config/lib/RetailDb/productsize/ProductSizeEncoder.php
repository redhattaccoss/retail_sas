<?php
class ProductSizeEncoder extends Encoder{
	public function json_encode($result, Setting $otherSetting = null){
		if ($otherSetting->getMode()==Setting::$MULTIPLE){
			return $this->renderProductSizes($result);
		}else{
			return $this->renderIndividualProductSize($result);
		}
	}
	private function renderIndividualProductSize(ProductSize $productSize){
		$output = array();
		if ($productSize!=null){
			$output["name"] = $productSize->getName();
			$output["viewOrder"] = $productSize->getViewOrder();
			$output["id"] = $productSize->getPk();
			$output["sizeGroupId"] = $productSize->getSizeGroupId();			
		}
		return $output;
	} 
	
	private function renderProductSizes($productSizes){
		$output = array();
		if (!empty($productSizes)){
			foreach($productSizes as $productSize){
				/* @var $productSize ProductSize */
				$output["productSizes"][] = $this->renderIndividualProductSize($productSize);
			}
		}
		return $output;
	}
	
	public function json_passed($object = null){
		if ($object!=null){
			return array("result"=>true, "productSize"=>$this->renderIndividualProductSize($object));
		}else{
			return parent::json_passed();
		}
	}
}