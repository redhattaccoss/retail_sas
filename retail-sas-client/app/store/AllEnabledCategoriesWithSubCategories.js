Ext.define("RS.store.AllEnabledCategories",{
	extend:"Ext.data.Store",
	model:"RS.model.Category",
	require:"RS.model.Category",
	proxy: {
        type: 'ajax',
        url: baseUrl+"/rest.php?call=/category/listEnabledWithSubCategories",
        reader: {
            type: 'json',
            root: 'categories',
            successProperty: 'result'
        }
   },
	autoLoad:true
});