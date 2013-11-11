Ext.define("RS.model.LineItem", {
	extend:"Ext.data.Model",
	fields:[
		{name:"price", type:"float"},
		{name:"priceExtGst", type:"float"},
		{name:"quantity", type:"int"},
		{name:"subtotal", type:"float"},
		{name:"subtotalExtGst", type:"float"}
	],
	belongsTo:[{model:"ProductOption", name:"productOption"}]
});
