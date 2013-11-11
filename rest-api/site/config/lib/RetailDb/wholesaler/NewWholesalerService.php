<?php
class NewWholesalerService extends BaseWholesalerService{
	
	public function __construct(){
		parent::__construct();
		$this->validators[] = new RequiredChecker(
										array(self::$FIELD_NAME,
											 self::$FIELD_WHOLESALER_TYPE_ID,
											 self::$FIELD_CONTACT_NAME,
											 self::$FIELD_CONTACT_EMAIL,
											 self::$FIELD_USERNAME,
											 self::$FIELD_PASSWORD ));
	   $this->validators[] = new IndexChecker(WholesalerIQL::$_TABLE, WholesalerIQL::$USERNAME, self::$FIELD_USERNAME);
	}
	
	protected function runImplementation(){
		$wholesaler = new Wholesaler();
		
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
		$enabled = Request::getSafeGetOrPost(self::$FIELD_ENABLED);
		$wholesaler->setName($name);
		$wholesaler->setWholesalerTypeId($wholesalerTypeId);
		$wholesaler->setUsername($username);
		$wholesaler->setPassword(md5($password));
		$wholesaler->setContactName($contactName);
		$wholesaler->setContactEmail($contactEmail);
		$wholesaler->setWebsite($website);
		$wholesaler->setBlog($blog);
		$wholesaler->setLogo($logo);
		if (trim($enabled)!=""){
			$wholesaler->setEnabled($enabled);
		}else{
			$wholesaler->setEnabled("0");
		}
		if (trim($newsletterSubscription)!=""){
			$wholesaler->setNewsletterSubscription($newsletterSubscription);
		}else{
			$wholesaler->setNewsletterSubscription("0");
		}
		$wholesaler->setRating($rating);
		
		$wholesaler = $this->dao->create($wholesaler);
		
		return $this->encoder->json_passed($wholesaler);
	}
}