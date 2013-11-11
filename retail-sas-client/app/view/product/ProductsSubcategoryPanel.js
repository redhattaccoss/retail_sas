Ext.define("RS.view.product.ProductsSubcategoryPanel", {
	extend: "Ext.panel.Panel",
	subcategoryTemplate:null,
	productList:null,
	alias:"widget.productsSubcategoryPanel",
	border:false,
	initComponent:function(){
		var subcategoryTemplate = new Ext.XTemplate("<ul class='product-list'>",
														'<tpl for="products">',
																'<tpl if="this.isLast(order)">',
																	"<li class='product-item last'>",
																		"<div class='picture-container'>",
																			"<a href='#' onclick='EventDispatcher.productLinkClicked({id});return false;'>",
																				'<img src="'+imageUrl+'/{id}/{image}"/>',
																			"</a>",
																		"</div>",
																		"<p><a href='#' onclick='EventDispatcher.productLinkClicked({id});return false;'>{name}</a></p>",
																		"<p><a href='#' onclick='EventDispatcher.productLinkClicked({id});return false;'>", 
																			'<tpl if="this.displayRange(priceLow, priceHigh)">',
																				"$ {priceLow} - $ {priceHigh}",
																			"</tpl>",		
																			'<tpl if="this.notDisplayRange(priceLow, priceHigh)">',
																				"$ {priceLow}",
																			"</tpl>",
																		"</a></p>",
																	"</li>",
																'</tpl>',
																'<tpl if="this.notIsLast(order)">',
																	"<li class='product-item'>",
																		"<div class='picture-container'>",
																			"<a href='#' onclick='EventDispatcher.productLinkClicked({id});return false;'>",
																				'<img src="'+imageUrl+'/{id}/{image}"/>',
																			"</a>",
																		"</div>",
																		"<p><a href='#' onclick='EventDispatcher.productLinkClicked({id});return false;'>{name}</a></p>",
																		"<p><a href='#' onclick='EventDispatcher.productLinkClicked({id});return false;'>", 
																			'<tpl if="this.displayRange(priceLow, priceHigh)">',
																				"$ {priceLow} - $ {priceHigh}",
																			"</tpl>",		
																			'<tpl if="this.notDisplayRange(priceLow, priceHigh)">',
																				"$ {priceLow}",
																			"</tpl>",
																		"</a></p>",
																	"</li>",
																'</tpl>',
														"</tpl>",
													"</ul>", {
														isLast:function(index){
															return index%3==0;
														},
														notIsLast:function(index){
															return index%3!=0;
														},
														displayRange:function(priceLow, priceHigh){
															return (priceLow!=priceHigh);
														
														},
														notDisplayRange:function(priceLow, priceHigh){
															return (priceLow==priceHigh);
														},
														renderImageURL:function(image, id){
															return imageUrl+"/"+id+"/"+image;
														}
													});
		this.subcategoryTemplate = subcategoryTemplate;
		this.callParent(arguments);
	},
	update:function(subcategoryId){
		var me = this;
		var service = Ext.create("RS.transact.product.ProductListBySubCategoryService");
		service.callback = callback;
		service.run(subcategoryId, false);		
		function callback(result, request, jsonresult){
			var data = result.responseText;
			data = Ext.decode(data);
			
			
			me.subcategoryTemplate.overwrite(me.body, data);
			Navigation.navigate("productsSubcategoryPanel");
		}
	}
	
});
