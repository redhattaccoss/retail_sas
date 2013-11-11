<?php
class UpdateProductRangeService extends Service{
	public static $FIELD_NAME = "name";
	public static $FIELD_DESCRIPTION = "description";
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME, self::$FIELD_ID));
		$this->dao = new ProductRangeDao();
		$this->encoder = new ProductRangeEncoder();
	}
	protected function runImplementation(){
		
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$description = Request::getSafeGetOrPost(self::$FIELD_DESCRIPTION);
		$productRange = $this->dao->get(Request::getSafeGetOrPost(self::$FIELD_ID));
		$productRange->setName($name);
		$productRange->setDescription($description);		
		$productRange = $this->dao->save($productRange);
		return $this->encoder->json_passed($productRange);
	}
}