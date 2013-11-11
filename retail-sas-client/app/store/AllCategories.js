Ext.define("RS.store.AllCategories",{
	extend:"Ext.data.Store",
	model:"RS.model.Category",
	require:"RS.model.Category",
	proxy: {
        type: 'ajax',
        url: baseUrl+"/rest.php?call=/category/list&enabledOnly=0",
        reader: {
            type: 'json',
            root: 'categories',
            successProperty: 'result'
        }
   },
	autoLoad:true
});