<?php
class UpdateProductColourService extends Service{
	public static $FIELD_NAME = "name";
	public static $FIELD_ID = "id";
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(array(self::$FIELD_NAME, self::$FIELD_ID));
		$this->dao = new ProductColourDao();
		$this->encoder = new ProductColourEncoder();
	}
	protected function runImplementation(){
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$productColour = $this->dao->get(Request::getSafeGetOrPost(UpdateProductColourService::$FIELD_ID));
		$productColour->setName($name);
		$productColour = $this->dao->save($productColour);
		return $this->encoder->json_passed($productColour);
		
	}
}