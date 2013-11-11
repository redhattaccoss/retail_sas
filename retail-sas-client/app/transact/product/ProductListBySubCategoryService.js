Ext.define("RS.transact.product.ProductListBySubCategoryService", {
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/product/subCategoryList";
	},
	run:function(subcategoryId, detailed){
		var detailedValue = "0";
		if (detailed){
			detailedValue = "1";
		}
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:{
				subcategoryId:subcategoryId,
				detailedValue:detailedValue
			}
		});
	}
});
