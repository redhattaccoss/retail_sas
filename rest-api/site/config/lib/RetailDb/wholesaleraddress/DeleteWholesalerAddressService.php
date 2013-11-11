<?php
class DeleteWholesalerAddressService extends BaseWholesalerAddressService{
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$this->dao->delete(Request::getSafeGetOrPost(self::$FIELD_ID));
		return $this->encoder->json_passed();
	}
} 