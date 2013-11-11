Ext.define("RS.transact.auth.LogoutService", {
	extend:"RS.transact.Service",
	contructor:function(){
		this.url = baseUrl+"/authenticate.php?call=logout"
	},
	run:function(){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback
		});
	}
});