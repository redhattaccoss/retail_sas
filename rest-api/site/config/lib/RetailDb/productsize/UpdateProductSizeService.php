<?php
class UpdateProductSizeService extends Service{
	public static $FIELD_SIZE_GROUP_ID = "sizeGroupId";
	public static $FIELD_NAME = "name";
	public static $FIELD_VIEW_ORDER = "viewOrder";
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->encoder = new ProductSizeEncoder();
		$this->dao = new ProductSizeDao();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME, self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$sizeGroupId = Request::getSafeGetOrPost(self::$FIELD_SIZE_GROUP_ID);
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$viewOrder = Request::getSafeGetOrPost(self::$FIELD_VIEW_ORDER);
		$id = Request::getSafeGetOrPost(self::$FIELD_ID);
		$productSize = $this->dao->get($id);
		$productSize->setSizeGroupId($sizeGroupId);
		$productSize->setViewOrder($viewOrder);
		$productSize->setName($name);
		$productSize = $this->dao->save($productSize);
		return $this->encoder->json_passed($productSize);
	}
}