Ext.define("RS.transact.auth.LoginService", {
	extend:"RS.transact.Service",
	contructor:function(){
		this.url = baseUrl+"/authenticate.php?call=login"
	},
	run:function(username, password){
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:{
				username:username,
				password:password
			}
		});
	}
});