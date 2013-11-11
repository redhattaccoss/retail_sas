Ext.define("RS.model.ProductOption", {
	extend:"Ext.data.Model",
	fields:[
		{name:"id", type:"int"},
		{name:"wholesaleActive", type:"string"},
		"size",
		"colour",
		{name:"price", type:"float"},
		{name:"rrp", type:"float"}	
	],
	validations:[
		{type:"presence", name:"price"}
	]
});
