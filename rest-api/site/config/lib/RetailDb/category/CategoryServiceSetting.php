<?php
/**
 * Settings for Category Related classes ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */

class CategoryServiceSetting extends Setting{
	/**
	* Render categories only
	 */
	private $categoriesOnly = "1";	
	/**
	 * Render subcategories only ...
	 * @var boolean
	 */
	private $subCategoriesOnly = false;

	/**
	 * Render a tree view ...
	 * @var boolean
	 */
	private $treeView = false;
	
	/**
	 * Set categoriesOnly field's value ...
	 * @param String $categoriesOnly should be 1 or 0
	 */
	public function setCategoriesOnly($categoriesOnly){
		if (trim($categoriesOnly)!=""){
			$this->categoriesOnly = $categoriesOnly;
		}	
	}
	
	/**
	 * Get Categories Only value ...
	 */
	public function getCategoriesOnly(){
		return $this->categoriesOnly;
	}
	/**
	 * Set categoriesOnly field's value ...
	 * @param String $subCategoriesOnly should be true or false
	 */
	public function setSubCategoriesOnly($subCategoriesOnly){
		$this->subCategoriesOnly = $subCategoriesOnly;
	}
	
	/**
	 * Get subCategoriesOnly value ...
	 */
	public function getSubCategoriesOnly(){
		return $this->subCategoriesOnly;
	}
	
	
	public function setTreeView($treeView){
		if ($treeView == "1"){	
			$this->treeView = true;	
		}else{
			$this->treeView = false;	
		}
	}
	
	public function getTreeView(){
		return $this->treeView;
	}
	
}