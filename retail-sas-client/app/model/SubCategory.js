Ext.define("RS.model.SubCategory", {
	extend:"Ext.data.Model",
	fields:[
			{name:"id", type:"int"},
	        {name:"name", type:"string"},
	        {name:"shortUrl", type:"string"},
	        {name:"enabled", type:"boolean"}
	],
	belongsTo:"Category",
	validations:[
		{name:"name", type:"presence"},
		{name:"shortUrl", type:"presence"}		
	],
	proxy:{
		api:{
			read:baseUrl+"/rest.php?call=/subcategory/list"
		},
		type:"rest",
		reader: {
            type: 'json',
            root: 'categories',
            successProperty: 'result'
        }
		
	}
});
