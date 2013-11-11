<?php
class NewProductSizeService extends Service{
	public static $FIELD_SIZE_GROUP_ID = "sizeGroupId";
	public static $FIELD_NAME = "name";
	public static $FIELD_VIEW_ORDER = "viewOrder";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductSizeEncoder();
		$this->dao = new ProductSizeDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME));
	}	
	protected function runImplementation(){
		$sizeGroupId = Request::getSafeGetOrPost(self::$FIELD_SIZE_GROUP_ID);
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$viewOrder = Request::getSafeGetOrPost(self::$FIELD_VIEW_ORDER);
		$productSize = new ProductSize();
		$productSize->setName($name);
		$productSize->setSizeGroupId($sizeGroupId);
		$productSize->setViewOrder($viewOrder);
		$productSize = $this->dao->create($productSize);
		return $this->encoder->json_passed($productSize);
	}
}