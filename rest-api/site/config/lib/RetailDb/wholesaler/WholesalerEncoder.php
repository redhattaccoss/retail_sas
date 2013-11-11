<?php
class WholesalerEncoder extends Encoder{
	public function json_encode($result, Setting $setting = null){
		if ($setting->getMode()==Setting::$INDIVIDUAL){
			return $this->renderIndividualWholesaler($result, $setting);
		}else{
			return $this->renderWholesalers($result, $setting);
		}
	}
	
	private function renderIndividualWholesaler($result, Setting $setting){
		if ($setting->getDetailed()=="1"){
			return $this->renderDetailedWholesaler($result);
		}else{
			return $this->renderSummaryWholesaler($result);
		}
	}
	
	private function renderSummaryWholesaler($wholesaler){
		$output = array();
		/* @var $wholesaler WholeSaler */
		if ($wholesaler!=null){
			$output["id"] = $wholesaler->getPk();
			$output["name"] = $wholesaler->getName();
			$output["contactName"] = $wholesaler->getContactName();
			$output["contactEmail"] = $wholesaler->getContactEmail();
			$output["website"] = $wholesaler->getWebsite();
			$output["blog"] = $wholesaler->getBlog();
			$output["rating"] = $wholesaler->getRating();
		}
		return $output;
	}
	
	private function renderDetailedWholesaler($wholesaler){
		$output = array();
		/* @var $wholesaler WholeSaler */
		if ($wholesaler!=null){
			$output = $this->renderSummaryWholesaler($wholesaler);
			$output["wholesalerTypeId"] = $wholesaler->getWholesalerTypeId();
			$output["enabled"] = $wholesaler->getEnabled();
			$output["username"] = $wholesaler->getUsername();
			$output["password"] = $wholesaler->getPassword();
			$output["logo"] = $wholesaler->getLogo();
			$output["newsletterSubscription"] = $wholesaler->getNewsLetterSubscription();
			$output["wholesalerType"] = $this->renderWholesalerType($wholesaler); 
		}
		return $output;
	}
	
	private function renderWholesalerType($wholesaler){
		/* @var $wholesaler Wholesaler */
		$output = array();
		$wholesalerType = $wholesaler->getWholesalerTypeIdAsObject();
		/* @var $wholesalerType WholesalerType */
		$output["id"] = $wholesalerType->getPk();
		$output["name"] = $wholesalerType->getName();
		return $output;
	}
	private function renderWholesalers($result, Setting $setting){
		$output = array();
		if (!empty($result)){
			foreach($result as $wholesaler){
				$output["wholesalers"][] = $this->renderIndividualWholesaler($wholesaler, $setting);
			}
		}
		return  $output;
	}
	
	public function json_passed($object = null){
		/* @var $object Wholesaler */
		if ($object!=null){
			$wholesaler = $this->renderSummaryWholesaler($object);
			return array("result"=>true, "npk"=>$object->getPk(), "wholesaler"=>$wholesaler);
		}else{
			return parent::json_passed();
		}
	}
	
	
}