<?php
/**
 * Encoder for Products ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class ProductEncoder extends Encoder{
	public function json_encode($result, Setting $setting=null){
		if ($setting->getMode()==Setting::$INDIVIDUAL){
			return $this->renderIndividualProduct($result, $setting);
		}else{
			return $this->renderProducts($result, $setting);
		}
	}
	
	private function renderIndividualProduct($product, $setting){
		$output = array();
		if ($product!=null){
			if ($setting->getDetailed()){
				return $this->renderDetailedProduct($product);
			}else{
				return $this->renderSummaryProduct($product);
			}
		}
		return $output;
	}
	
	/**
	 * Render detailed product ...
	 * @param Product $product
	 */
	private function renderDetailedProduct(Product $product){
		$output = array();
		/* @var $product Product */
		if ($product!=null){
			$output["id"] = $product->getPk();
			$output["name"] = $product->getName();
			$output["shortUrl"] = $product->getShortUrl();
			$output["options"] = $this->renderProductOptions($product);
			$output["images"] =  $this->renderProductImages($product->getProductWebImageObjectsViaProductId());
			$setting = new ProductTypeServiceSetting();
			$setting->setMode(Setting::$INDIVIDUAL);
			$encoder = new ProductTypesEncoder();
			$productType = $product->getProductTypeIdAsObject();
			/* @var $productType ProductType */
			$output["productType"] = $encoder->json_encode($product->getProductTypeIdAsObject(), $setting);
			$output["wholesaleActive"] = $product->getWholesaleActive();
			$output["description"] = $product->getDescription();
			$output["materials"] = $product->getMaterials();
			$output["sampleImage"] = $product->getSampleImage();
		}
		return $output;
	}
	
	/**
	 * Render Summary Product ...
	 * @param Product $product
	 */
	private function renderSummaryProduct(Product $product){
		/* @var $product Product */
		$output = array();
		if ($product!=null){
			$output["id"] = intval($product->getPk());
			$output["name"] = $product->getName();
			$output["shortUrl"] = $product->getShortUrl();
			$productOptions = $product->getProductOptionObjectsViaProductId();
			$output["priceLow"] = floatval($this->getLowestPrice($productOptions));
			$output["priceHigh"] = floatval($this->getHighestPrice($productOptions));
			$images = $product->getProductWebImageObjectsViaProductId();
			/* @var $image ProductWebImage */
			if (!empty($images)){
				$image = $images[0];			
				$output["image"] = $image->getSmallImage();
			}else{
				$output["image"] = "";
			}	
			$output["wholesaleActive"] = $product->getWholesaleActive();
		}
		return $output;
	}
	
	private function getLowestPrice($productOptions){
		$lowestPrice = 0;
		$i = 0;
		if (!empty($productOptions)){
			foreach($productOptions as $productOption){
				/* @var $productOption ProductOption */
				if ($i==0){
					$lowestPrice = $productOption->getWholesalePrice();	
				}
				if ($lowestPrice>$productOption->getWholesalePrice()){
					$lowestPrice = $productOption->getWholesalePrice();
				}
				$i++;
			}
		}
		return $lowestPrice;
	}
	
	private function getHighestPrice($productOptions){
		$highestPrice = 0;
		$i = 0;
		if (!empty($productOptions)){
			foreach($productOptions as $productOption){
				/* @var $productOption ProductOption */
				if ($i==0){
					$highestPrice = $productOption->getWholesalePrice();	
				}
				if ($highestPrice<$productOption->getWholesalePrice()){
					$highestPrice = $productOption->getWholesalePrice();
				}
				$i++;
			}
		}
		return $highestPrice;
	}
	
	private function renderProductOptions($product){
		$output = array();
		$productOptions = $product->getProductOptionObjectsViaProductId();
		if (!empty($productOptions)){
			foreach($productOptions as $productOption){
				/* @var $productOption ProductOption */
				$output[] = $this->renderProductOption($productOption);
			}
		}		
		return $output;
	}
	
	private function renderProductOption(ProductOption $productOption){
		$output = array();
		if ($productOption!=null){
			$output["id"] = $productOption->getPk();
			$output["wholesaleActive"] = $productOption->getWholesaleActive(); 
			//gets the product size
			$productSize = ProductSizeIQL::select()->where(ProductSizeIQL::$_TABLE, ProductSizeIQL::$SIZEID, "=", $productOption->getSizeId())->getFirst();
			$encoder = new ProductSizeEncoder();
			$setting = new ProductSizeServiceSetting();
			$setting->setMode(Setting::$INDIVIDUAL);
			$output["size"] = $encoder->json_encode($productSize, $setting);
			$productColour = $productOption->getColourIdAsObject();
			$encoder = new ProductColourEncoder();
			$setting = new ProductColourServiceSetting();
			$setting->setMode(Setting::$INDIVIDUAL);
			$output["colour"] = $encoder->json_encode($productColour, $setting);
			$output["price"] = $productOption->getWholesalePrice();
			$output["saleWholesalePrice"] = $productOption->getSaleWholesalePrice();
			$output["rrp"] = $productOption->getRRP();
		}
		return $output;
	}
	
	/**
	 * Renders for product web images
	 * 
	 */
	private function renderProductImages($productWebImages){
		$output = array();
		if (!empty($productWebImages)){
			foreach($productWebImages as $productWebImage){
				/* @var $productWebImage ProductWebImage */
				$output[] = $this->renderProductImage($productWebImage);				
			}
		}
		return $output;
	}
	
	/**
	 * Renders for a product web imaage object ...
	 * @param ProductWebImage $productWebImage
	 */
	private function renderProductImage($productWebImage){
		/* @var $productWebImage ProductWebImage */
		$output = array();
		if ($productWebImage!=null){
			$output["id"] = $productWebImage->getPk();
			$output["url"] = $productWebImage->getProductImage();
			$output["displayOrder"] = $productWebImage->getViewOrder();
		}	
		return $output;
	}
	
	
	private function renderProducts($products, $setting){
		$output = array();
		$order = 1;
		if (!empty($products)){
			foreach($products as $product){
				/* @var $product Product */
				$temp = $this->renderIndividualProduct($product, $setting);
				$temp["order"] = $order;
				$order++;
				$output["products"][] = $temp;
			}
		}
		return $output;
	}
	
	private function renderOtherDetail($product){
		$output["description"] = $product->getDescription();
		$output["productTypeId"] = $product->getProductTypeId();
		$output["rangeId"] = $product->getRangeId();
		$output["sampleImage"] = $product->getSampleImage();
		$output["vectorImage"] = $product->getVectorImage();
		$output["fSCCertified"] = $product->getFSCCertified();
		$output["allRecycled"] = $product->getAllRecycled();
		$output["ausMade"] = $product->getAusMade();
		$output["handMade"] = $product->getHandMade();
		$output["limitedEdition"] = $product->getLimitedEdition();
		$output["materials"] = $product->getMaterials();
		$output["wholesaleOrderInfo"] = $product->getWholesaleOrderInfo();
		$output["quantityTemplateId"] = $product->getQuantityTemplateId();
		$output["personaliseEnabled"] = $product->getPersonaliseEnabled();
		$output["personalisationConfigId"] = $product->getPersonalisationConfigId();
		return $output;
	}
	
	
}