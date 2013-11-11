Ext.define("RS.transact.product.GetProductService", {
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/product/get";
	},
	run:function(id){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:{
				id:id
			}
		});
	}
});
