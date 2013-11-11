Ext.define("RS.view.ui.Navigation", {
	extend:"Ext.panel.Panel",
	width:200,
	height:400,
	title:"Navigation",
	alias:"widget.mainNavigation",
	layout:"accordion",
	items:[
	{
		xtype:"categoryAccordionPanel"
	},{
		xtype:"productAccordionPanel"
	}
	]
});
