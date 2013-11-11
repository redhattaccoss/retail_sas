<?php
class WholesalerAddressEncoder extends Encoder{
	public function json_encode($result, Setting $setting = null){
		if ($setting->getMode()==Setting::$INDIVIDUAL){
			return $this->renderIndividualWholesalerAddress($result, $setting);
		}else{
			return $this->renderWholesalerAddresses($result, $setting);
		}
	}
	
	private function renderIndividualWholesalerAddress($wholesalerAddress, Setting $setting){
		/* @var $wholesalerAddress WholesalerAddress */
		$output = array();
		if ($wholesalerAddress!=null){
			$output["id"] = $wholesalerAddress->getPk();
			$output["wholesalerId"] = $wholesalerAddress->getWholesalerId();
			$output["addressId"] = $wholesalerAddress->getAddressId();
			$output["address"] = $this->renderAddress($wholesalerAddress->getAddressIdAsObject(), $setting);
		}
		return $output;
	}
	
	private function renderAddress($address, Setting $setting){
		/* @var $address Address */
		$output = array();
		if ($address!=null){
			$output["id"] = $address->getPk();
			$output["address"] = $address->getAddress();
			$output["address2"] = $address->getAddress2();
			$output["city"] = $address->getCity();
			$output["state"] = $address->getState();
			$output["postcode"] = $address->getPostCode();
			$output["addressCountryId"] = $address->getAddressCountryId();
			$output["addressCountry"] = $this->renderAddressCountry($address->getAddressCountryIdAsObject());	
			$output["addressTypeId"] = $address->getAddressTypeId();
			$output["addressType"] = $this->renderAddressType($address->getAddressTypeIdAsObject());
			if ($setting->getSendDescription()=="1"){
				$output["description"] = $address->getDescription();
			}
		}	
		return $output;	
	}
	
	private function renderAddressCountry($addressCountry){
		/* @var $addressCountry AddressCountry */
		$output = array();
		if ($addressCountry!=null){
			$output["id"] = $addressCountry->getPk();
			$output["country"] = $addressCountry->getCountry();
			$output["countryCode"] = $addressCountry->getCountryCode();
		}
		return $output;
	}
	
	private function renderAddressType($addressType){
		$output = array();
		/* @var $addressType AddressType */
		if ($addressType!=null){
			$output["id"] = $addressType->getPk();
			$output["type"] = $addressType->getType();
		}
		return $output;
	}
	
	private function renderWholesalerAddresses($addresses, Setting $setting){
		$output = array();
		if (!empty($addresses)){
			foreach($addresses as $address){
				$output["wholesalerAddresses"][] = $this->renderIndividualWholesalerAddress($address, $setting);
			}
		}
		return $output;
	}
	
	public function json_passed($object){
		/* @var $object WholesalerAddress */
		if ($object!=null){
			$setting = new WholesalerAddressServiceSetting();
			$setting->setMode(Setting::$INDIVIDUAL);
			$wholesalerAddress = $this->renderIndividualWholesalerAddress($object, $setting);
			return array("result"=>true, "npk"=>$object->getPk(), "wholesalerAddress"=>$wholesalerAddress);
		}else{
			return parent::json_passed();
		}
	}
	
	
}