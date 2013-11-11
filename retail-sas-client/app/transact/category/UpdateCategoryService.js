Ext.define("RS.transact.category.UpdateCategoryService", {
	extend:"RS.transact.Service",
	constructor:function(){
		this.url = baseUrl+"/rest.php?call=/category/update";
	},
	run:function(data){
		var enabled = data.enabled;
		if (enabled){
			enabled = "1";
		}else{
			enabled = "0";
		}
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:{
				name:data.name,
				shortUrl:data.shortUrl,
				enabled:enabled,
				id:data.id
			}
		});
	}
});
