<?php
/**
 * Results encoder of Category Service. Encoding based on 3.3 ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class CategoryEncoder extends Encoder{
	public function json_encode($result, Setting $otherSetting = null){
		$this->output = array();
		$enabledOnly = $otherSetting->getEnabledOnly();
		$categoriesOnly = $otherSetting->getCategoriesOnly();
		$subCategoriesOnly = $otherSetting->getSubCategoriesOnly();
		$mode = $otherSetting->getMode();
		if (!$otherSetting->getTreeView()){
			if ($mode==CategoryServiceSetting::$MULTIPLE){ //if mode is multiple
				if ($subCategoriesOnly){
					$this->renderSubCategories($result, $enabledOnly);
				}else{
					$this->renderCategories($result, $categoriesOnly, $enabledOnly);
				}		
				return $this->output;
			}else{
				if ($subCategoriesOnly){
					return $this->renderSubCategory($result);
				}else{
					return $this->renderInvidiualCategory($result, $categoriesOnly, $enabledOnly);
				}
			}
		}else{
			return $this->treeView($result);
		}
	}
	
	/**
	 * Render Categories with or without subcategories ...
	 * @param $categories The categories
	 * @param $categoriesOnly specifies if categories only will be rendered
	 * @param $enabledOnly specifies if enabled only categories will be rendered
	 */
	private function renderCategories($categories, $categoriesOnly, $enabledOnly){
		if (!empty($categories)){
			//loop every loaded categories
			foreach($categories as $category){ 
				/* @var $category Category */
				
				//form associative array as specified in 3.3.2
				$entry = $this->renderInvidiualCategory($category, $categoriesOnly, $enabledOnly);				
				$this->output["categories"][] = $entry;
			}
		}
	}
	
	/**
	 * Render individual category based on the parameters passed ...
	 * @param Category $category
	 * @param $categoriesOnly specifies if categories only will be rendered
	 * @param $enabledOnly specifies if enabled only categories will be rendered
	 * @return array
	 */
	private function renderInvidiualCategory(Category $category,$categoriesOnly,$enabledOnly="1"){
		//form associative array as specified in 3.3.2
		$entry["id"] = $category->getPk();
		$entry["name"] = $category->getName();
		$entry["shortUrl"] = $category->getShortUrl();
		$entry["enabled"] = $category->getEnabled();
		//if categoriesOnly is not marked as 1, we should incorporate the subcategories of the specific category as well
		if ($categoriesOnly!="1"){
			if ($enabledOnly=="1"){ //skips if the enabledOnly is on
				$subCategories = SubCategoryIQL::select()->where(SubCategoryIQL::$_TABLE, SubCategoryIQL::$CATEGORYID, "=", $category->getPk())->_and(SubCategoryIQL::$_TABLE, SubCategoryIQL::$ENABLED, "=", "1")->get();
			}else{
				$subCategories = SubCategoryIQL::select()->where(SubCategoryIQL::$_TABLE, SubCategoryIQL::$CATEGORYID, "=", $category->getPk())->get();
			}
			if (!empty($subCategories)){
				//loops over evey subCategory entries
				foreach($subCategories as $subCategory){
					/* @var $subCategory SubCategory */
					$temp = $this->renderSubCategory($subCategory);
					$entry["subCategories"][] =  $temp;
					
				}
			}
		}
		return $entry;
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
				$temp = $this->renderSubCategory($subCategory);
				$this->output["subCategories"][] =  $temp;				
			}
		}
	}
	
	/**
	 * Render a SubCategory...
	 * @param $subCategory the subcategory loaded
	 */
	private function renderSubCategory($subCategory){	
		$temp = array();
		if ($subCategory!=null){
			$temp["id"] =  $subCategory->getPk();
			$temp["name"] = $subCategory->getName();
			$temp["shortUrl"] = $subCategory->getShortUrl();
			$temp["enabled"] = $subCategory->getEnabled();
			$temp["categoryId"] = $subCategory->getCategoryId();
		}
		return $temp;
	}
	public function json_passed($object = null){
		/* @var $object Category */
		if ($object!=null){
			$category = $this->renderInvidiualCategory($object, "1");
			return array("result"=>true, "npk"=>$object->getPk(), "category"=>$category);
		}else{
			return parent::json_passed();
		}
	}
	
	/**
	 * Gets a tree view of categories ...
	 * @param array $categories
	 */
	private function treeView($categories){
		$output = array();
		$output["text"] = ".";
		if (!empty($categories)){
			foreach($categories as $category){
				$categoryJson["text"] = $category->getName();
				$categoryJson["id"] = $category->getPk();
				$categoryJson["expanded"] = true;
 				$categoryJson["children"] = $this->getSubCategoriesAsTreeView($category->getSubCategoryObjectsViaCategoryId());
				$output["children"][] = $categoryJson;
			}
		}
		return $output;
	}
	
	
	private function getSubCategoriesAsTreeView($subCategories){
		$output = array();
		if (!empty($subCategories)){	
			foreach($subCategories as $subCategory){
				$subCategoryJson["text"] = $subCategory->getName();
				$subCategoryJson["id"] = $subCategory->getPk();
				$subCategoryJson["leaf"] = true;
				$output[] = $subCategoryJson; 
			}
		}
		return $output;
	}
}