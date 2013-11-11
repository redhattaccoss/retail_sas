Ext.define("RS.transact.shoppingbag.ClearShoppingBagService", {
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/shoppingbag/clear"
	},
	run:function(){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback
		});
	}
});
