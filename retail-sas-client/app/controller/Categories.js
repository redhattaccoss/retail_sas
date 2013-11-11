/**
 * Categories Controller 
 * Author Allanaire Tapion
 * Copyright 2011 - Inform8
 */

Ext.define("RS.controller.Categories", {
	extend:"Ext.app.Controller",
	stores:[
		"AllEnabledCategories"
	],
	views:[
		"category.Edit"
	],
	models:[
		"Category"
	],
	refs:[
		{
			ref:"categoryGrid",
			selector:"categorylist"
		}
	],	
	init:function(){
		this.control({
            'viewport > panel': {
                render: this.onPanelRendered
            },
            "categorylist":{
            	itemdblclick:this.selectCategory
            },
            "categoryeditwindow button[action=save]":{
            	click:this.save
            },
            "categoryeditwindow button[action=add]":{
            	click:this.add
            },
            "#categorySideNavToolbar button[action=addCategory]":{
            	click:this.addCategory
            }
        });
	},
	onPanelRendered:function(){
		
	},
	addCategory:function(){
		var window = Ext.widget("categoryeditwindow", {action:"add"});
		window.setTitle("Add Category");
	},
	add:function(button){
		var form = button.up("window").down("form");
		var win = button.up("window");
		var values = form.getValues();
		console.log(values);
	},
	selectCategory:function(grid, record){
		console.log(record.data);
	},editCategory:function(grid, record){
		var window = Ext.widget("categoryeditwindow");
		window.setTitle("Edit Category");
		window.down("form").loadRecord(record);	
	},
	save:function(button){
		var form = button.up("window").down("form");
		var win = button.up("window");
		var values = form.getValues();
		var record = form.getRecord();
		var enabled = "";
		if (values.enabled=="on"){
			enabled = "1";
		}else{
			enabled = "0";
		}
		
		var category = Ext.create("RS.model.Category", {
			name:values.name,
			shortUrl:values.shortUrl,
			enabled:enabled,
			id:record.get("id")
		});
		win.close();
		var service = Ext.create("RS.transact.category.UpdateCategoryService");
		service.callback = this.callbackHandler;
		service.run(category.data);
	},
	callbackHandler:function(result, request, jsonresult){
		var data = result.responseText;
		var result = Ext.decode(data);
		if (result.result){
			Ext.ComponentQuery.query("categorylist")[0].getStore().load();
			
		}	
	}
});