<?php
/**
 * Copyright 2011 - Inform8
 * http://www.inform8.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * http://www.apache.org/licenses/LICENSE-2.0
 */
    
	//base classes and factories
     Inform8Context::getClassRegistry()->registerClass("Encoder", "config/lib/RetailDb/Encoder.php");
     Inform8Context::getClassRegistry()->registerClass("Service", "config/lib/RetailDb/Service.php");
     Inform8Context::getClassRegistry()->registerClass("Setting", "config/lib/RetailDb/Setting.php");
     Inform8Context::getClassRegistry()->registerClass("ServiceFactory", "config/lib/RetailDb/ServiceFactory.php");
     
     //validators and checkers
     Inform8Context::getClassRegistry()->registerClass("IChecker", "config/lib/RetailDb/validators/IChecker.php");
     Inform8Context::getClassRegistry()->registerClass("RequiredChecker", "config/lib/RetailDb/validators/RequiredChecker.php");
     Inform8Context::getClassRegistry()->registerClass("IndexChecker", "config/lib/RetailDb/validators/IndexChecker.php");
     Inform8Context::getClassRegistry()->registerClass("QuantityChecker", "config/lib/RetailDb/validators/QuantityChecker.php");
     Inform8Context::getClassRegistry()->registerClass("AuthChecker", "config/lib/RetailDb/validators/AuthChecker.php");
     
     
     //Product Types related classes
     Inform8Context::getClassRegistry()->registerClass("ProductTypesListService", "config/lib/RetailDb/producttype/ProductTypesListService.php");
     Inform8Context::getClassRegistry()->registerClass("ProductTypesEncoder", "config/lib/RetailDb/producttype/ProductTypesEncoder.php");
     Inform8Context::getClassRegistry()->registerClass("ProductTypeServiceSetting", "config/lib/RetailDb/producttype/ProductTypeServiceSetting.php");
     
     
     //Category Service related classes
     Inform8Context::getClassRegistry()->registerClass("CategoryEncoder", "config/lib/RetailDb/category/CategoryEncoder.php");
     Inform8Context::getClassRegistry()->registerClass("CategoryListService", "config/lib/RetailDb/category/CategoryListService.php");
     Inform8Context::getClassRegistry()->registerClass("WholesaleCategoryListService", "config/lib/RetailDb/category/WholesaleCategoryListService.php");
     Inform8Context::getClassRegistry()->registerClass("ConsumerCategoryListService", "config/lib/RetailDb/category/ConsumerCategoryListService.php");
     Inform8Context::getClassRegistry()->registerClass("CategoryServiceSetting", "config/lib/RetailDb/category/CategoryServiceSetting.php");
 	 Inform8Context::getClassRegistry()->registerClass("EnableDisableRetailCategoryService", "config/lib/RetailDb/category/EnableDisableRetailCategoryService.php");
     Inform8Context::getClassRegistry()->registerClass("EnableDisableWholesaleCategoryService", "config/lib/RetailDb/category/EnableDisableWholesaleCategoryService.php");
 	 Inform8Context::getClassRegistry()->registerClass("NewCategoryService", "config/lib/RetailDb/category/NewCategoryService.php");
 	 Inform8Context::getClassRegistry()->registerClass("UpdateCategoryService", "config/lib/RetailDb/category/UpdateCategoryService.php");
 	 Inform8Context::getClassRegistry()->registerClass("GetCategoryService", "config/lib/RetailDb/category/GetCategoryService.php");
 	 Inform8Context::getClassRegistry()->registerClass("DeleteCategoryService", "config/lib/RetailDb/category/DeleteCategoryService.php");
 	 
 	 
 	 //Sub Category Service related classes
 	 Inform8Context::getClassRegistry()->registerClass("EnableDisableRetailSubCategoryService", "config/lib/RetailDb/subcategory/EnableDisableRetailSubCategoryService.php");
     Inform8Context::getClassRegistry()->registerClass("EnableDisableWholesaleSubCategoryService", "config/lib/RetailDb/subcategory/EnableDisableWholesaleSubCategoryService.php");
     Inform8Context::getClassRegistry()->registerClass("NewSubCategoryService", "config/lib/RetailDb/subcategory/NewSubCategoryService.php");
     Inform8Context::getClassRegistry()->registerClass("UpdateSubCategoryService", "config/lib/RetailDb/subcategory/UpdateSubCategoryService.php");
     Inform8Context::getClassRegistry()->registerClass("SubCategoryListService", "config/lib/RetailDb/subcategory/SubCategoryListService.php");
     Inform8Context::getClassRegistry()->registerClass("WholesaleSubCategoryListService", "config/lib/RetailDb/subcategory/WholesaleSubCategoryListService.php");
     Inform8Context::getClassRegistry()->registerClass("RetailSubCategoryListService", "config/lib/RetailDb/subcategory/RetailSubCategoryListService.php");
     Inform8Context::getClassRegistry()->registerClass("GetSubCategoryService", "config/lib/RetailDb/subcategory/GetSubCategoryService.php");
     Inform8Context::getClassRegistry()->registerClass("DeleteAllSubCategoryService", "config/lib/RetailDb/subcategory/DeleteAllSubCategoryService.php");
     
     
     //Product Colour Service related classes
     Inform8Context::getClassRegistry()->registerClass("ProductColourServiceSetting", "config/lib/RetailDb/productcolour/ProductColourServiceSetting.php");
     Inform8Context::getClassRegistry()->registerClass("ProductColourListService", "config/lib/RetailDb/productcolour/ProductColourListService.php");
     Inform8Context::getClassRegistry()->registerClass("ProductColourEncoder", "config/lib/RetailDb/productcolour/ProductColourEncoder.php");
     Inform8Context::getClassRegistry()->registerClass("NewProductColourService", "config/lib/RetailDb/productcolour/NewProductColourService.php");
     Inform8Context::getClassRegistry()->registerClass("UpdateProductColourService", "config/lib/RetailDb/productcolour/UpdateProductColourService.php");
     Inform8Context::getClassRegistry()->registerClass("GetProductColourService", "config/lib/RetailDb/productcolour/GetProductColourService.php");
     Inform8Context::getClassRegistry()->registerClass("DeleteProductColourService", "config/lib/RetailDb/productcolour/DeleteProductColourService.php");
     
     
    //Product Size List Service
  	Inform8Context::getClassRegistry()->registerClass("ProductSizeListService", "config/lib/RetailDb/productsize/ProductSizeListService.php");
    Inform8Context::getClassRegistry()->registerClass("ProductSizeServiceSetting", "config/lib/RetailDb/productsize/ProductSizeServiceSetting.php");
    Inform8Context::getClassRegistry()->registerClass("ProductSizeEncoder", "config/lib/RetailDb/productsize/ProductSizeEncoder.php");
    Inform8Context::getClassRegistry()->registerClass("NewProductSizeService", "config/lib/RetailDb/productsize/NewProductSizeService.php");
    Inform8Context::getClassRegistry()->registerClass("GetProductSizeService", "config/lib/RetailDb/productsize/GetProductSizeService.php");
    Inform8Context::getClassRegistry()->registerClass("UpdateProductSizeService", "config/lib/RetailDb/productsize/UpdateProductSizeService.php");
    Inform8Context::getClassRegistry()->registerClass("DeleteProductSizeService", "config/lib/Retaildb/productsize/DeleteProductSizeService.php");

    //Product Range Service
    Inform8Context::getClassRegistry()->registerClass("DeleteProductRangeService", "config/lib/Retaildb/productrange/DeleteProductRangeService.php");
 	Inform8Context::getClassRegistry()->registerClass("NewProductRangeService", "config/lib/Retaildb/productrange/NewProductRangeService.php");
    Inform8Context::getClassRegistry()->registerClass("ProductRangeEncoder", "config/lib/Retaildb/productrange/ProductRangeEncoder.php");
	Inform8Context::getClassRegistry()->registerClass("ProductRangeServiceSetting", "config/lib/Retaildb/productrange/ProductRangeServiceSetting.php");
    Inform8Context::getClassRegistry()->registerClass("UpdateProductRangeService", "config/lib/Retaildb/productrange/UpdateProductRangeService.php");
    Inform8Context::getClassRegistry()->registerClass("GetProductRangeService", "config/lib/Retaildb/productrange/GetProductRangeService.php");
    Inform8Context::getClassRegistry()->registerClass("ProductRangeListService", "config/lib/Retaildb/productrange/ProductRangeListService.php");
    
    
    //Product Service
    Inform8Context::getClassRegistry()->registerClass("ProductEncoder", "config/lib/Retaildb/product/ProductEncoder.php");
    Inform8Context::getClassRegistry()->registerClass("ProductServiceSetting", "config/lib/Retaildb/product/ProductServiceSetting.php");
    Inform8Context::getClassRegistry()->registerClass("GetProductService", "config/lib/Retaildb/product/GetProductService.php");
    Inform8Context::getClassRegistry()->registerClass("ProductBySubCategoryListService", "config/lib/Retaildb/product/ProductBySubCategoryListService.php");
    
    //Wholesaler Services
    Inform8Context::getClassRegistry()->registerClass("BaseWholesalerService", "config/lib/Retaildb/wholesaler/BaseWholesalerService.php");
    Inform8Context::getClassRegistry()->registerClass("DeleteAllWholesalerService", "config/lib/Retaildb/wholesaler/DeleteAllWholesalerService.php");
    Inform8Context::getClassRegistry()->registerClass("DeleteWholesalerService", "config/lib/Retaildb/wholesaler/DeleteWholesalerService.php");
    Inform8Context::getClassRegistry()->registerClass("GetWholesalerService", "config/lib/Retaildb/wholesaler/GetWholesalerService.php");
    Inform8Context::getClassRegistry()->registerClass("NewWholesalerService", "config/lib/Retaildb/wholesaler/NewWholesalerService.php");
    Inform8Context::getClassRegistry()->registerClass("UpdateWholesalerService", "config/lib/Retaildb/wholesaler/UpdateWholesalerService.php");
    Inform8Context::getClassRegistry()->registerClass("WholesalerEncoder", "config/lib/Retaildb/wholesaler/WholesalerEncoder.php");
    Inform8Context::getClassRegistry()->registerClass("WholesalerListService", "config/lib/Retaildb/wholesaler/WholesalerListService.php");
	Inform8Context::getClassRegistry()->registerClass("WholesalerSetting", "config/lib/Retaildb/wholesaler/WholesalerSetting.php");
	
	
    //Wholesaler Address Service
    Inform8Context::getClassRegistry()->registerClass("BaseWholesalerAddressService", "config/lib/Retaildb/wholesaleraddress/BaseWholesalerAddressService.php");
    Inform8Context::getClassRegistry()->registerClass("DeleteWholesalerAddressService", "config/lib/Retaildb/wholesaleraddress/DeleteWholesalerAddressService.php");
	Inform8Context::getClassRegistry()->registerClass("GetWholesalerAddressService", "config/lib/Retaildb/wholesaleraddress/GetWholesalerAddressService.php");
	Inform8Context::getClassRegistry()->registerClass("NewWholesalerAddressService", "config/lib/Retaildb/wholesaleraddress/NewWholesalerAddressService.php");
	Inform8Context::getClassRegistry()->registerClass("UpdateWholesalerAddressService", "config/lib/Retaildb/wholesaleraddress/UpdateWholesalerAddressService.php");
	Inform8Context::getClassRegistry()->registerClass("WholesalerAddressEncoder", "config/lib/Retaildb/wholesaleraddress/WholesalerAddressEncoder.php");
	Inform8Context::getClassRegistry()->registerClass("WholesalerAddressListService", "config/lib/Retaildb/wholesaleraddress/WholesalerAddressListService.php");
	Inform8Context::getClassRegistry()->registerClass("WholesalerAddressServiceSetting", "config/lib/Retaildb/wholesaleraddress/WholesalerAddressServiceSetting.php");
    
	
	//Shopping Bag Service
	Inform8Context::getClassRegistry()->registerClass("BaseLineItemService", "config/lib/Retaildb/shoppingbag/BaseLineItemService.php");
    Inform8Context::getClassRegistry()->registerClass("AddLineItemService", "config/lib/Retaildb/shoppingbag/AddLineItemService.php");
   	Inform8Context::getClassRegistry()->registerClass("UpdateLineItemService", "config/lib/Retaildb/shoppingbag/UpdateLineItemService.php");
    Inform8Context::getClassRegistry()->registerClass("GetLineItemService", "config/lib/Retaildb/shoppingbag/GetLineItemService.php");
   	Inform8Context::getClassRegistry()->registerClass("DeleteLineItemService", "config/lib/Retaildb/shoppingbag/DeleteLineItemService.php");
   	Inform8Context::getClassRegistry()->registerClass("ClearLineItemsService", "config/lib/Retaildb/shoppingbag/ClearLineItemsService.php");
   	Inform8Context::getClassRegistry()->registerClass("ProductOptionExistChecker", "config/lib/Retaildb/shoppingbag/checker/ProductOptionExistChecker.php");
   	Inform8Context::getClassRegistry()->registerClass("CheckoutService", "config/lib/Retaildb/shoppingbag/CheckoutService.php");
   	Inform8Context::getClassRegistry()->registerClass("ClearBillingService", "config/lib/Retaildb/shoppingbag/ClearBillingService.php");
   	Inform8Context::getClassRegistry()->registerClass("ListLineItemsService", "config/lib/Retaildb/shoppingbag/ListLineItemsService.php");
   	Inform8Context::getClassRegistry()->registerClass("SetBillingAddressService", "config/lib/Retaildb/shoppingbag/SetBillingAddressService.php");
   	Inform8Context::getClassRegistry()->registerClass("SetBillingDetailsService", "config/lib/Retaildb/shoppingbag/SetBillingDetailsService.php");
   	Inform8Context::getClassRegistry()->registerClass("SetDeliveryAddressService", "config/lib/Retaildb/shoppingbag/SetDeliveryAddressService.php");
   	Inform8Context::getClassRegistry()->registerClass("SetDeliveryOptionService", "config/lib/Retaildb/shoppingbag/SetDeliveryOptionService.php");
   	Inform8Context::getClassRegistry()->registerClass("BillingDetailSetChecker", "config/lib/RetailDb/shoppingbag/checker/BillingDetailSetChecker.php");
   	Inform8Context::getClassRegistry()->registerClass("DeliveryOptionExistChecker", "config/lib/RetailDb/shoppingbag/checker/DeliveryOptionExistChecker.php");
   	Inform8Context::getClassRegistry()->registerClass("BillingAddressExistChecker", "config/lib/RetailDb/shoppingbag/checker/BillingAddressExistChecker.php");
   	Inform8Context::getClassRegistry()->registerClass("DeliveryAddressExistChecker", "config/lib/RetailDb/shoppingbag/checker/DeliveryAddressExistChecker.php");
   	Inform8Context::getClassRegistry()->registerClass("NonEmptyOrderChecker", "config/lib/RetailDb/shoppingbag/checker/NonEmptyOrderChecker.php");
   	
   	
    Inform8Context::getClassRegistry()->registerClass("LineItem", "config/lib/Retaildb/shoppingbag/LineItem.php");
	Inform8Context::getClassRegistry()->registerClass("ShoppingBag", "config/lib/Retaildb/shoppingbag/ShoppingBag.php");
	Inform8Context::getClassRegistry()->registerClass("ShoppingBagServiceSetting", "config/lib/Retaildb/shoppingbag/ShoppingBagServiceSetting.php");
	Inform8Context::getClassRegistry()->registerClass("ShoppingBagEncoder", "config/lib/Retaildb/shoppingbag/ShoppingBagEncoder.php");
	
	
     require_once "config/lib/RetailDb/annotation/annotations.php";