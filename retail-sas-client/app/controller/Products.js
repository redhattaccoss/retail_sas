/**
 * Products Controller 
 * Author Allanaire Tapion
 * Copyright 2011 - Inform8
 */

Ext.define("RS.controller.Products", {
	extend:"Ext.app.Controller",
	stores:[
		"ListProductBySubCategory"
	], 
	views:[
		"product.ListBySubCategoryPanel",
		"product.ProductPagePanel",
		"product.ProductsSubcategoryPanel"
	],
	init:function(){
		this.control({
			"productListBySubCategoryGrid":{
				itemdblclick:this.selectProduct
			},
			"#sizeProductPage":{
				select:this.selectSize
			},
			"categoryeditwindow button[action=save]":{
            	click:this.save
           	},
			"productPage button[action=addtobag]":{
				click:this.addToBag
			}
		});
	},
	selectProduct:function(grid, record){
		var productPage = Ext.ComponentQuery.query("#productPage");
		productPage = productPage[0];
		productPage.update(record.data.id);
	},
	selectSize:function(comboBox){
		var selected = comboBox.getValue();
		var label = "";
		if ((selected.saleWholesalePrice!=undefined)&&(selected.saleWholesalePrice!=null)){
			label = "$ "+ selected.saleWholesalePrice;
		}else{
			label = "$ "+ selected.price;
		}
		var content = Ext.get("price-span-product-page");
		Ext.fly("price-span-product-page").removeCls("instruction");
		content.dom.innerHTML = label;
	},
	addToBag:function(button){
		var sizeProductPage = Ext.ComponentQuery.query("#sizeProductPage");
		sizeProductPage = sizeProductPage[0];
		
		var quantityProductPage = Ext.ComponentQuery.query("#quantityProductPage");
		quantityProductPage = quantityProductPage[0];
		
		var productOption = sizeProductPage.getValue();
		var quantity = quantityProductPage.getValue();
		var service = Ext.create("RS.transact.shoppingbag.AddShoppingBagService");
		service.callback = serviceCallback;
		function serviceCallback(result, request, jsonresult){
			
		}
		service.run(productOption.id, quantity);
	}
});