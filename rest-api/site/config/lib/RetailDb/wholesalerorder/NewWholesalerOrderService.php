<?php
class NewWholesalerOrderService extends Service{
	public static $FIELD_ID = "id";
	public static $FIELD_WHOLESALER_ID = "wholesalerId";
	public static $FIELD_STATE = "state";
	public static $FIELD_BILLING_NAME = "billingName";
	public static $FIELD_BILLING_ADDRESS = "billingAddress";
	public static $FIELD_BILLING_ADDRESS2 = "billingAddress2";
	public static $FIELD_BILLING_CITY = "billingCity";
	public static $FIELD_BILLING_STATE = "billingState";
	public static $FIELD_BILLING_POSTCODE = "billingPostCode";
	public static $FIELD_BILLING_COUNTRY = "billingCountry";
	public static $FIELD_DELIVERY_ADDRESS = "deliveryAddress";
	public static $FIELD_DELIVERY_ADDRESS2 = "deliveryAddress2";
	public static $FIELD_DELIVERY_CITY = "deliveryCity";
	public static $FIELD_DELIVERY_STATE = "deliveryState";
	public static $FIELD_DELIVERY_POSTCODE = "deliveryPostCode";
	public static $FIELD_DELIVERY_COUNTRY = "deliveryCountry";
	public static $FIELD_DELIVERY_INSTRUCTIONS = "deliveryInstructions";
	public static $FIELD_DELIVERY_OPTION = "deliveryOption";
	public static $FIELD_DELIVERY_PRICE = "deliveryPrice";
	public static $FIELD_PRIVATE_ORDER_NOTES = "privateOrderNotes";
	public static $FIELD_INVOICE_ORDER_NOTES = "invoiceOrderNotes";
	public static $FIELD_WEB_ORDER = "webOrder";
	public static $FIELD_DISPATCH_DATE = "dispatchDate";
	
	public function __construct(){
		parent::__construct();
		$this->dao = new WholesalerOrderDao();
	}
	
	protected function runImplementation(){
		
	}
	
}