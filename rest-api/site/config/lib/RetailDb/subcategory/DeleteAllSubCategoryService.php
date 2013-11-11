<?php
class DeleteAllSubCategoryService extends Service{
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new SubCategoryDao();
	}
	protected function runImplementation(){
		$this->dao->getWithSql("DELETE FROM ".SubCategoryIQL::$_TABLE, false);
		return $this->encoder->json_passed();
	}
}