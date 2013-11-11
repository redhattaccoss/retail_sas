<?php
class ProductRangeEncoder extends Encoder{
	public function json_encode($result, Setting $otherSetting = null){
		$this->setting = $otherSetting;
		if ($otherSetting->getMode()==ProductRangeServiceSetting::$MULTIPLE){
			return $this->renderMultipleProductRanges($result);
		}else{
			return $this->renderIndividualProductRange($result);	
		}
	}
	
	private function renderMultipleProductRanges($result){
		if (!empty($result)){
			foreach($result as $productRange){
				/* @var $productRange ProductRange */
				$temp = $this->renderIndividualProductRange($productRange);
				$this->output["productRanges"][] = $temp;
				
			}
		}
		return $this->output;
	}
	
	private function renderIndividualProductRange($productRange){
		$temp = array();
		if ($productRange!=null){
			$temp["id"] = $productRange->getPk();
			$temp["name"] = $productRange->getName();
			if (($this->setting!=null)&&($this->setting->getSendDescription()=="1")){
				$temp["description"] = $productRange->getDescription();
			}
		}
		return $temp;	
	}
	
	public function json_passed($object = null){
		if ($object!=null){
			return array("result"=>true, "productRange"=>$this->renderIndividualProductRange($object));
		}else{
			return parent::json_passed();
		}
	}
}