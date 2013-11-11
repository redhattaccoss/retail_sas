Ext.define("RS.store.CategoriesTreeStore", {
	extend:"Ext.data.TreeStore",
	proxy:{
		type:"ajax",
		url:baseUrl+"/rest.php?call=/category/list&treeView=1"
	},
	autoLoad:true,
	root:{
		expanded:true
	}
});
