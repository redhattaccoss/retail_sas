/**
 * App.js - Startup of Retail SAS - ExtJS App
 */

Ext.require([
	'Ext.tip.QuickTipManager',
	'Ext.container.Viewport',
    'Ext.layout.*'
]);


Ext.application({
	name:"RS",
	appFolder:"app",
	controllers:[
	   "Main",
	   "Categories",
	   "Products"
	],
	launch:function(){
		
		var contentPanel = {
			xtype:"contentPanel",
			items:[
				{xtype:"panel", id:"blank"},
				{xtype:"productsSubcategoryPanel", id:"productsSubcategoryPanel"},
				{xtype:"productPage", id:"productPage"}
			],
			id:"viewPort",
           	activeItem:0,
           	autoScroll:true
		};
		
		var centerPanel = Ext.create("Ext.panel.Panel", {
			width:960,
			height:650,
			items:[
			    {xtype:"sasheader", id:"sasheader"},
		    	contentPanel
			]
		});
		
		
		Ext.create('Ext.container.Viewport', {
            layout:{
            	type:"hbox",
            	pack:"center",
            	align:"middle"
            },
            items:[
	            centerPanel
            ],
            renderTo:Ext.getBody()
        });
        
	}
});
