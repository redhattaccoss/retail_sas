<?php
class UpdateWholesalerService extends BaseWholesalerService{
	public static $FIELD_ID = "id";
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(
										array(
											 self::$FIELD_ID,
											 self::$FIELD_NAME,
											 self::$FIELD_WHOLESALER_TYPE_ID,
											 self::$FIELD_CONTACT_NAME,
											 self::$FIELD_CONTACT_EMAIL,
											 self::$FIELD_USERNAME,
											 self::$FIELD_PASSWORD ));
	 	$this->validators[] = new IndexChecker(WholesalerIQL::$_TABLE, WholesalerIQL::$USERNAME, self::$FIELD_USERNAME, Request::getSafeGetOrPost(self::$FIELD_ID));
	}
	
	protected function runImplementation(){
		$wholesaler = $this->dao->get(Request::getSafeGetOrPost(self::$FIELD_ID));
		
		$name = Request::getSafeGetOrPost(self::$FIELD_NAME);
		$wholesalerTypeId = Request::getSafeGetOrPost(self::$FIELD_WHOLESALER_TYPE_ID);
		$username = Request::getSafeGetOrPost(self::$FIELD_USERNAME);
		$password = Request::getSafeGetOrPost(self::$FIELD_PASSWORD);
		$contactName = Request::getSafeGetOrPost(self::$FIELD_CONTACT_NAME);
		$contactEmail = Request::getSafeGetOrPost(self::$FIELD_CONTACT_EMAIL);
		$website = Request::getSafeGetOrPost(self::$FIELD_WEBSITE);
		$blog = Request::getSafeGetOrPost(self::$FIELD_BLOG);
		$logo = Request::getSafeGetOrPost(self::$FIELD_LOGO);
		$rating = Request::getSafeGetOrPost(self::$FIELD_RATING);
		$newsletterSubscription = Request::getSafeGetOrPost(self::$FIELD_NEWSLETTER_SUBSCRIPTION);
		
		$wholesaler->setName($name);
		$wholesaler->setWholesalerTypeId($wholesalerTypeId);
		$wholesaler->setUsername($username);
		$wholesaler->setPassword(md5($password));
		$wholesaler->setContactName($contactName);
		$wholesaler->setContactEmail($contactEmail);
		$wholesaler->setWebsite($website);
		$wholesaler->setBlog($blog);
		$wholesaler->setLogo($logo);
		$wholesaler->setNewsletterSubscription($newsletterSubscription);
		$wholesaler->setRating($rating);
		
		$wholesaler = $this->dao->save($wholesaler);
		
		return $this->encoder->json_passed($wholesaler);
	}
}