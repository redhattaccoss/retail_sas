/**
 * Base class for a service
 */

Ext.define("RS.transact.Service",{
	callback:null,
	url:"",
	run:function(data){
		var encodedData = Ext.encode(data);
		console.log(encodedData);
		Ext.Ajax.request({
			url:this.url,
			success:this.callback,
			params:encodedData
		});
	}
});

