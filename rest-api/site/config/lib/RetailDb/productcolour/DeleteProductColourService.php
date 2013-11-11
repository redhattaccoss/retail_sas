<?php
class DeleteProductColourService extends Service{
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductColourEncoder();
		$this->dao = new ProductColourDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$this->dao->delete(Request::getOrPost(self::$FIELD_ID));
		return $this->encoder->json_passed();
	}
}