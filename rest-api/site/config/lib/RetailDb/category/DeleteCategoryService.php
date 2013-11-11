<?php
class DeleteCategoryService extends Service{
	public function __construct(){
		parent::__construct();
		$this->encoder = new CategoryEncoder();
		$this->dao = new CategoryDao();
	}
	
	public function runImplementation(){
		$this->dao->getWithSql("DELETE FROM ".CategoryIQL::$_TABLE, false);
		return $this->encoder->json_passed();
	}
}