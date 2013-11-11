Ext.define("RS.store.ListProduct",{
	extend:"Ext.data.Store",
	model:"RS.model.Product",
	require:"RS.model.Product",
	proxy: {
        type: 'ajax',
        url: baseUrl+"/rest.php?call=/category/list",
        reader: {
            type: 'json',
            root: 'categories',
            successProperty: 'result'
        }
   },
	autoLoad:true
});