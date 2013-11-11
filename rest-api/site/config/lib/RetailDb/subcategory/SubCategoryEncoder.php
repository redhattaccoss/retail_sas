<?php
class SubCategoryEncoder extends Encoder{
	public function json_encode($result, Setting $otherSetting = null){
		
	}
	
	/**
	 * Render SubCategories with or without subcategories ...
	 * @param $subCategories the subcategories loaded
	 * @param $enabledOnly specifies if enabled only categories will be rendered
	 */
	private function renderSubCategories($subCategories, $enabledOnly){		
		if (!empty($subCategories)){
			//loops over evey subCategory entries
			foreach($subCategories as $subCategory){
				/* @var $subCategory SubCategory */
				if ($enabledOnly=="1"){ //skips if the enabledOnly is on
					if (!$subCategory->getEnabled()){
						continue;
					}
				}
				$temp["SubCategory"]["id"] =  $subCategory->getPk();
				$temp["SubCategory"]["name"] = $subCategory->getName();
				$temp["SubCategory"]["shortUrl"] = $subCategory->getShortUrl();
				$temp["SubCategory"]["enabled"] = $subCategory->getEnabled();
				$this->output[] =  $temp;				
			}
		}
		return $this->output;
	}
}