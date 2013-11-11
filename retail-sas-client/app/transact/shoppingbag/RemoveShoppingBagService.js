Ext.define("RS.transact.shoppingbag.RemoveShoppingBagService",{
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/shoppingbag/delete"
	},
	run:function(productOptionId){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:{
				productOptionId:productOptionId
			}
		});
	}
});
