<?php
class DeleteProductSizeService extends Service{
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductSizeEncoder();
		$this->dao = new ProductSizeDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_ID));
	}
	protected function runImplementation(){
		$id = Request::getSafeGetOrPost(self::$FIELD_ID);
		$this->dao->delete($id);
		return $this->encoder->json_passed();
	}
}