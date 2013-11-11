<?php
class DeleteAllWholesalerService extends BaseWholesalerService{	
	public function __construct(){
		parent::__construct();
	}
	
	protected function runImplementation(){
		$this->dao->getWithSql("DELETE FROM ".WholesalerIQL::$_TABLE, false);
		return $this->encoder->json_passed();
	}
}
