<?php
class NewProductColourService extends Service{
	public static $FIELD_NAME = "name";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME));
		$this->dao = new ProductColourDao();
		$this->encoder = new ProductColourEncoder();
	}
	protected function runImplementation(){
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$productColour = new ProductColour();
		$productColour->setName($name);
		$productColour = $this->dao->create($productColour);
		return $this->encoder->json_passed($productColour);
	}
}