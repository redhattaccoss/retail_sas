Ext.define("RS.view.category.CategoryAccordionPanel", {
	extend:"Ext.panel.Panel",
	alias:"widget.categoryAccordionPanel",
    title : 'All Categories',
	initComponent:function(){
		var toolbar = Ext.create("Ext.toolbar.Toolbar", {
			width:400,
			items:[
				{
					text:"Add Category",
					action:"addCategory"
				}
			],
			id:"categorySideNavToolbar"
		});
		this.items = [
				toolbar, 
				{xtype:"categorylist"}
		];
		this.callParent(arguments);
	}
})
