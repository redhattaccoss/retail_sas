<?php
/**
 * Result Encoder of a Shopping bag ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class ShoppingBagEncoder extends Encoder{
	public function json_encode($result, Setting $setting = null){
		if ($result==null){
			if ($setting->getMode()==ShoppingBagServiceSetting::$ALL){
				return $this->renderAll();
			}else if ($setting->getMode()==ShoppingBagServiceSetting::$ITEMS_ONLY){
				return $this->renderItems();
			}else if ($setting->getMode()==ShoppingBagServiceSetting::$SUMMARY_ONLY){
				return $this->renderSummary();
			}
		}else if (is_object($result)){
			return $this->renderLineItem($result);
		}
	}
	
	private function renderAll(){
		$output = array();
		$output = $this->renderItems();
		$output["summary"] = $this->renderSummary();
		return $output;
	}
	
	private function renderSummary(){
		return ShoppingBag::getInstance()->toJSON();
	}
	
	private function renderItems(){
		$items = ShoppingBag::getInstance()->getItems();
		$output = array();
		if (!empty($items)){
			foreach($items as $item){
				/* @var $item LineItem */
				$output["items"][] = $this->renderLineItem($item);
			}
		}
		
		return $output;
		
	}
	
	private function renderLineItem($item){
		/* @var $item LineItem */
		$price = floatval($item->getPrice());
		$priceExtGst = floatval($item->getPriceExGst());
		$productOption = $this->renderProductOption($item->getProductOption());
		$quantity = $item->getQuantity();
		$subtotal = floatval($item->getSubtotal());
		$subtotalExtGst = floatval($item->getSubtotalExGst());
		return array("price"=>$price, "priceExtGst"=>$priceExtGst, "productOption"=>$productOption, "quantity"=>$quantity, "subtotal"=>$subtotal, "subtotalExtGst"=>$subtotalExtGst );
	}
	
	private function renderProductOption($productOption){
		$output = array();
		/* @var $productOption ProductOption */
		if ($productOption!=null){
			$output["id"] = intval($productOption->getPk());
			$output["wholesalePrice"] = floatval($productOption->getWholesalePrice());
			$output["saleWholesalePrice"] = floatval($productOption->getSaleWholesalePrice());
			$output["productId"] = intval($productOption->getProductId());
		}
		return $output;
	}
}