Ext.define("RS.transact.shoppingbag.AddShoppingBagService", {
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/shoppingbag/add";
	},
	run:function(productOptionId, quantity){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:{
				productOptionId:productOptionId,
				quantity:quantity
			}
		});
	}
});
