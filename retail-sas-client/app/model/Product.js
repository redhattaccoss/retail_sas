Ext.define("RS.model.Product",{
	extend:"Ext.data.Model",
	fields:[
		{name:"id", type:"int"},
	    {name:"name", type:"string"},
	    {name:"shortUrl", type:"string"},
	    {name:"priceLow", type:"float"},
	    {name:"priceHigh", type:"float"},
	    {name:"image", type:"string"},
	    {name:"wholesaleActive", type:"boolean"},
	    {name:"description", type:"string"},
	    {name:"materials", type:"string"}],
	hasMany:[
			{model:"ProductOption", name:"options"},
			{model:"ProductWebImage", name:"images"}],
	validations:[
		{type:"presence", name:"name"},
		{type:"presence", name:"shortUrl"}
	]
				
});