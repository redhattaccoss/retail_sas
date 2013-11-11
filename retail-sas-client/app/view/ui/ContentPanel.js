Ext.define("RS.view.ui.ContentPanel", {
	 extend:"Ext.panel.Panel",
     region: 'center', // this is what makes this panel into a region within the containing layout
     layout: 'card',
     margins: '2 5 5 0',
     activeItem: 0,
     border: false,
  	 alias:"widget.contentPanel"
});