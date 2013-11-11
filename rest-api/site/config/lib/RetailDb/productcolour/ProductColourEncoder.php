<?php
/**
 * Encoder for Product Colour ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class ProductColourEncoder extends Encoder{
	public function json_encode($result, Setting $otherSetting = null){
		if ($otherSetting->getMode()==ProductColourServiceSetting::$MULTIPLE){
			return $this->renderMultipleProductColours($result);
		}else{
			return $this->renderIndividualProductColour($result);	
		}
	}
	private function renderMultipleProductColours($result){
		if (!empty($result)){
			foreach($result as $productColour){
				/* @var $productColour ProductColour */
				$temp = $this->renderIndividualProductColour($productColour);
				$this->output["productColours"][] = $temp;
			}
		}
		return $this->output;
	}
	
	private function renderIndividualProductColour($productColour){
		$temp = array();
		if ($productColour!=null){
			$temp["id"] = $productColour->getPk();
			$temp["name"] = $productColour->getName();
		}
		return $temp;	
	}
	
	public function json_passed($object = null){
		if ($object!=null){
			return array("result"=>true, "productColour"=>$this->renderIndividualProductColour($object));
		}else{
			return parent::json_passed();
		}
	}
}