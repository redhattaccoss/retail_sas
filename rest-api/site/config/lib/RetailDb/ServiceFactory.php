<?php
/**
 * Responsible for producing the service based on the paramater call ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 *
 */
class ServiceFactory{
	public static $SERVICE_PRODUCT_TYPES_LIST = "/producttype/list";  
	
	//category related constants
	public static $SERVICE_CATEGORY_LIST = "/category/list";
	public static $SERVICE_WHOLESALE_CATEGORY_LIST = "/category/wholesale/list";
	public static $SERVICE_CONSUMER_CATEGORY_LIST = "/category/consumer/list";
	public static $SERVICE_GET_CATEGORY = "/category/get";
	public static $SERVICE_WHOLESALE_CATEGORY_ENABLEDISABLE = "/category/wholesale/enabledisable";
	public static $SERVICE_RETAIL_CATEGORY_ENABLEDISABLE = "/category/retail/enabledisable";
	public static $SERVICE_NEW_CATEGORY = "/category/new";
	public static $SERVICE_UPDATE_CATEGORY = "/category/update";
	public static $SERVICE_CATEGORY_LIST_ENABLED_WITH_SUBCATEGORIES = "/category/listEnabledWithSubCategories";
	public static $SERVICE_CATEGORY_DELETE_ALL = "/category/deleteAll";
	
	//subcategory related constants
	public static $SERVICE_NEW_SUBCATEGORY = "/subcategory/new";
	public static $SERVICE_UPDATE_SUBCATEGORY = "/subcategory/update";
	public static $SERVICE_WHOLESALE_SUBCATEGORY_ENABLEDISABLE = "/subcategory/wholesale/enabledisable";
	public static $SERVICE_RETAIL_SUBCATEGORY_ENABLEDISABLE = "/subcategory/retail/enabledisable";
	public static $SERVICE_SUBCATEGORY_LIST = "/subcategory/list";
	public static $SERVICE_WHOLESALE_SUBCATEGORY_LIST = "/subcategory/wholesale/list";
	public static $SERVICE_RETAIL_SUBCATEGORY_LIST = "/subcategory/retail/list";
	public static $SERVICE_GET_SUBCATEGORY = "/subcategory/get";
	public static $SERVICE_SUBCATEGORY_DELETE_ALL = "/subcategory/deleteAll";

	
	//product colour related constants
	public static $SERVICE_PRODUCT_COLOUR_LIST = "/productcolour/list";
	public static $SERVICE_NEW_PRODUCT_COLOUR = "/productcolour/new";
	public static $SERVICE_UPDATE_PRODUCT_COLOUR = "/productcolour/update";
	public static $SERVICE_GET_PRODUCT_COLOUR = "/productcolour/get";
	public static $SERVICE_DELETE_PRODUCT_COLOUR = "/productcolour/delete";
			
	
	//product size related constants
	public static $SERVICE_PRODUCT_SIZE_LIST = "/productsize/list";
	public static $SERVICE_NEW_PRODUCT_SIZE = "/productsize/new";	
	public static $SERVICE_GET_PRODUCT_SIZE = "/productsize/get";
	public static $SERVICE_UPDATE_PRODUCT_SIZE = "/productsize/update";
	public static $SERVICE_DELETE_PRODUCT_SIZE = "/productsize/delete";
	
	//product range
	public static $SERVICE_PRODUCT_RANGE_LIST = "/productrange/list";
	public static $SERVICE_NEW_PRODUCT_RANGE = "/productrange/new";
	public static $SERVICE_UPDATE_PRODUCT_RANGE = "/productrange/update";
	public static $SERVICE_GET_PRODUCT_RANGE = "/productrange/get";
	public static $SERVICE_DELETE_PRODUCT_RANGE = "/productrange/delete";
	
	//product
	public static $SERVICE_PRODUCT_SUBCATEGORY_LIST = "/product/subCategoryList";
	public static $SERVICE_GET_PRODUCT = "/product/get";
	
	//wholesaler
	public static $SERVICE_NEW_WHOLESALER = "/wholesaler/new";
	public static $SERVICE_UPDATE_WHOLESALER = "/wholesaler/update";
	public static $SERVICE_GET_WHOLESALER = "/wholesaler/get";
	public static $SERVICE_WHOLESALER_LIST = "/wholesaler/list";
	public static $SERVICE_DELETE_WHOLESALER = "/wholesaler/delete";
	public static $SERVICE_WHOLESALER_DELETE_ALL = "/wholesaler/deleteAll";
	
	//wholesaler address
	public static $SERVICE_NEW_WHOLESALER_ADDRESS = "/wholesaleraddress/new";
	public static $SERVICE_UPDATE_WHOLESALER_ADDRESS = "/wholesaleraddress/update";
	public static $SERVICE_GET_WHOLESALER_ADDRESS = "/wholesaleraddress/get";
	public static $SERVICE_WHOLESALER_ADDRESS_LIST = "/wholesaleraddress/list";
	public static $SERVICE_DELETE_WHOLESALER_ADDRESS = "/wholesaleraddress/delete";

	//shopping bag services
	public static $SERVICE_SHOPPINGBAG_ADD = "/shoppingbag/add";
	public static $SERVICE_SHOPPINGBAG_UPDATE = "/shoppingbag/update";
	public static $SERVICE_SHOPPINGBAG_GET = "/shoppingbag/get";
	public static $SERVICE_SHOPPINGBAG_DELETE = "/shoppingbag/delete";
	public static $SERVICE_SHOPPINGBAG_LIST = "/shoppingbag/list";
	public static $SERVICE_SHOPPINGBAG_CLEAR = "/shoppingbag/clear";
	public static $SERVICE_SHOPPINGBAG_BILLING_CLEAR = "/shoppingbag/billing/clear";
	public static $SERVICE_SHOPPINGBAG_BILLING_SET = "/shoppingbag/billing/set";
	public static $SERVICE_SHOPPINGBAG_DELIVERY_ADDRESS_SET = "/shoppingbag/billing/deliveryaddress/set";
	public static $SERVICE_SHOPPINGBAG_DELIVERY_OPTION_SET = "/shoppingbag/billing/deliveryoption/set";
	public static $SERVICE_SHOPPINGBAG_BILLING_ADDRESS_SET = "/shoppingbag/billing/address/set";
	public static $SERVICE_SHOPPINGBAG_CHECKOUT = "/shoppingbag/checkout";
	
	
	
	/**
	 * Returns a service ...
	 * @param String $request
	 * @return Service
	 */
	public static function getService($request){
		$request = trim($request);
		if ($request==ServiceFactory::$SERVICE_PRODUCT_TYPES_LIST){
			return new ProductTypesListService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALE_CATEGORY_LIST){
			return new WholesaleCategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_CONSUMER_CATEGORY_LIST){
			return new ConsumerCategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_CATEGORY_LIST){
			return new CategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALE_CATEGORY_ENABLEDISABLE){
			return new EnableDisableWholesaleCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_RETAIL_CATEGORY_ENABLEDISABLE){
			return new EnableDisableRetailCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_GET_CATEGORY){
			return new GetCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_NEW_CATEGORY){
			return new NewCategoryService();
		}else if  ($request==ServiceFactory::$SERVICE_UPDATE_CATEGORY){
			return new UpdateCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_NEW_SUBCATEGORY){
			return new NewSubCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_UPDATE_SUBCATEGORY){
			return new UpdateSubCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALE_SUBCATEGORY_ENABLEDISABLE){
			return new EnableDisableWholesaleSubCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_RETAIL_SUBCATEGORY_ENABLEDISABLE){
			return new EnableDisableRetailSubCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_SUBCATEGORY_LIST){
			return new SubCategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALE_SUBCATEGORY_LIST){
			return new WholesaleSubCategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_RETAIL_SUBCATEGORY_LIST){
			return new RetailSubCategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_GET_SUBCATEGORY){
			return new GetSubCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_CATEGORY_LIST_ENABLED_WITH_SUBCATEGORIES){
			return new CategoryListService("0", "1");
		}else if ($request==ServiceFactory::$SERVICE_PRODUCT_COLOUR_LIST){
			return new ProductColourListService();
		}else if ($request==ServiceFactory::$SERVICE_NEW_PRODUCT_COLOUR){
			return new NewProductColourService();
		}else if ($request==ServiceFactory::$SERVICE_UPDATE_PRODUCT_COLOUR){
			return new UpdateProductColourService();
		}else if ($request==ServiceFactory::$SERVICE_GET_PRODUCT_COLOUR){
			return new GetProductColourService();		
		}else if ($request==ServiceFactory::$SERVICE_DELETE_PRODUCT_COLOUR){
			return new DeleteProductColourService();	
		}else if ($request==ServiceFactory::$SERVICE_CATEGORY_DELETE_ALL){
			return new DeleteCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_SUBCATEGORY_DELETE_ALL){
			return new DeleteAllSubCategoryService();
		}else if ($request==ServiceFactory::$SERVICE_PRODUCT_SIZE_LIST){
			return new ProductSizeListService();
		}else if ($request==ServiceFactory::$SERVICE_NEW_PRODUCT_SIZE){
			return new NewProductSizeService();
		}else if ($request==ServiceFactory::$SERVICE_GET_PRODUCT_SIZE){
			return new GetProductSizeService();
		}else if ($request==ServiceFactory::$SERVICE_UPDATE_PRODUCT_SIZE){
			return new UpdateProductSizeService();
		}else if ($request==ServiceFactory::$SERVICE_DELETE_PRODUCT_SIZE){
			return new DeleteProductSizeService();
		}else if ($request==ServiceFactory::$SERVICE_PRODUCT_RANGE_LIST){
			return new ProductRangeListService();
		}else if ($request==ServiceFactory::$SERVICE_DELETE_PRODUCT_RANGE){
			return new DeleteProductRangeService();			
		}else if ($request==ServiceFactory::$SERVICE_NEW_PRODUCT_RANGE){
			return new NewProductRangeService();
		}else if ($request==ServiceFactory::$SERVICE_UPDATE_PRODUCT_RANGE){
			return new UpdateProductRangeService();
		}else if ($request==ServiceFactory::$SERVICE_GET_PRODUCT_RANGE){
			return new GetProductRangeService();
		}else if ($request==ServiceFactory::$SERVICE_PRODUCT_SUBCATEGORY_LIST){
			return new ProductBySubCategoryListService();
		}else if ($request==ServiceFactory::$SERVICE_GET_PRODUCT){
			return new GetProductService();
		}else if ($request==ServiceFactory::$SERVICE_NEW_WHOLESALER){
			return new NewWholesalerService();
		}else if ($request==ServiceFactory::$SERVICE_UPDATE_WHOLESALER){
			return new UpdateWholesalerService();
		}else if ($request==ServiceFactory::$SERVICE_GET_WHOLESALER){
			return new GetWholesalerService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALER_LIST){
			return new WholesalerListService();
		}else if ($request==ServiceFactory::$SERVICE_DELETE_WHOLESALER){
			return new DeleteWholesalerService();
		}else if ($request==ServiceFactory::$SERVICE_NEW_WHOLESALER_ADDRESS){
			return new NewWholesalerAddressService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALER_DELETE_ALL){
			return new DeleteAllWholesalerService();
		}else if ($request==ServiceFactory::$SERVICE_WHOLESALER_ADDRESS_LIST){
			return new WholesalerAddressListService();
		}else if ($request==ServiceFactory::$SERVICE_GET_WHOLESALER_ADDRESS){
			return new GetWholesalerAddressService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_ADD){
			return new AddLineItemService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_UPDATE){
			return new UpdateLineItemService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_GET){
			return new GetLineItemService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_DELETE){
			return new DeleteLineItemService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_CLEAR){
			return new ClearLineItemsService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_BILLING_ADDRESS_SET){
			return new SetBillingAddressService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_BILLING_CLEAR){
			return new ClearBillingService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_BILLING_SET){
			return new SetBillingDetailsService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_CHECKOUT){
			return new CheckoutService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_DELIVERY_ADDRESS_SET){
			return new SetDeliveryAddressService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_DELIVERY_OPTION_SET){
			return new SetDeliveryOptionService();
		}else if ($request==ServiceFactory::$SERVICE_SHOPPINGBAG_LIST){
			return new ListLineItemsService();
		}
		return null;
	}
}