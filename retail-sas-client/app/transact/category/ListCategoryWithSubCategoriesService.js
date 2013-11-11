Ext.define("RS.transact.category.ListCategoryWithSubCategoriesService", {
	extend: "RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/category/listEnabledWithSubCategories";
	},
	run:function(){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback
		});
	}
});