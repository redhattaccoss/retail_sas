Ext.define("RS.transact.shoppingbag.ListShoppingItemsService", {
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/shoppingbag/list"
	},
	run:function(){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback
		});
	}	
});