/**
 * Product Accordion Panel
 * @Copyright 2011 - Inform8
 */
Ext.define("RS.view.ui.ProductAccordionPanel", {
	extend:"Ext.panel.Panel",
	alias:"widget.productAccordionPanel",
	title:"Products",
	height:400,
	initComponent:function(){
		
		this.items = [
			{xtype:"categoriesTreePanel"}
		];
		this.callParent(arguments);
	}
});
