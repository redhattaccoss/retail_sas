Ext.define("RS.store.ListProductBySubCategory", {
	extend:"Ext.data.Store",
	proxy:{
		url:baseUrl+"/rest.php?call=/product/subCategoryList", 
		type:"ajax",
		reader: {
            type: 'json',
            root: 'products',
            successProperty: 'result'
        }
	},
	model:"RS.model.Product",
	require:"RS.model.Product",
	autoLoad:false
})

