<?php
abstract class BaseWholesalerService extends Service{
	
	public static $FIELD_ENABLED = "enabled";
	public static $FIELD_NAME = "name";
	public static $FIELD_WHOLESALER_TYPE_ID = "wholesalerTypeId";
	public static $FIELD_USERNAME = "username";
	public static $FIELD_PASSWORD = "password";
	public static $FIELD_CONTACT_NAME = "contactName";
	public static $FIELD_CONTACT_EMAIL = "contactEmail";
	public static $FIELD_WEBSITE = "website";
	public static $FIELD_BLOG = "blog";
	public static $FIELD_LOGO = "logo";
	public static $FIELD_RATING = "rating";
	public static $FIELD_NEWSLETTER_SUBSCRIPTION = "newsletterSubscription";	
	
	public function __construct(){
		parent::__construct();
		$this->encoder = new WholesalerEncoder();
		$this->dao = new WholesalerDao();
	}
}