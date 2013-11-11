Ext.define("RS.model.Category",{
	extend:"Ext.data.Model",
	fields:[
			{name:"id", type:"int"},
	        {name:"name", type:"string"},
	        {name:"shortUrl", type:"string"},
	        {name:"enabled", type:"boolean"}],
	hasMany:"SubCategory",
	proxy:{
		api:{
			create:baseUrl+"/rest.php?call=/category/new",
			update:baseUrl+"/rest.php?call=/category/update",
			read:baseUrl+"/rest.php?call=/category/list"
		},
		type:"rest",
		reader: {
            type: 'json',
            root: 'categories',
            successProperty: 'result'
        }
		
	},
	validations:[
		{name:"name", type:"presence"},
		{name:"shortUrl", type:"presence"}		
	]
});