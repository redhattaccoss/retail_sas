<?php
class NewProductRangeService extends Service{
	public static $FIELD_NAME = "name";
	public static $FIELD_DESCRIPTION = "description";
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME));
		$this->dao = new ProductRangeDao();
		$this->encoder = new ProductRangeEncoder();
	}
	protected function runImplementation(){
		
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$description = Request::getSafeGetOrPost(self::$FIELD_DESCRIPTION);
		$productRange = new ProductRange();
		$productRange->setName($name);
		$productRange->setDescription($description);		
		$productRange = $this->dao->create($productRange);
		return $this->encoder->json_passed($productRange);
	}
}