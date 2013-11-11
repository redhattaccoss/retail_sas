var EventDispatcher = {
	categoryLinkClicked:function(id){
		var subcategoryPage = Ext.ComponentQuery.query("#productsSubcategoryPanel");
		subcategoryPage = subcategoryPage[0];
		subcategoryPage.update(id);
		
		/*
		var listGrid = Ext.ComponentQuery.query("#productListGrid");
		listGrid = listGrid[0];
		var proxy = listGrid.getStore().getProxy();
		proxy.url = baseUrl+"/rest.php?call=/product/subCategoryList&subcategoryId="+id;
		listGrid.getStore().load();
		var viewPort = Ext.ComponentQuery.query("#viewPort");
		viewPort = viewPort[0];
		//change viewport to product page...
		viewPort.getLayout().setActiveItem(0);
		*/
	},
	productLinkClicked:function(id){
		var productPage = Ext.ComponentQuery.query("#productPage");
		productPage = productPage[0];
		productPage.update(id);
	}
}	


var Navigation = {
	navigate:function(id){
		var viewPort = Ext.ComponentQuery.query("#viewPort");
		viewPort = viewPort[0];
		viewPort.getLayout().setActiveItem(id);
	}
}
