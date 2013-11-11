Ext.define("RS.view.ui.Header", {
	extend:"Ext.panel.Panel",
	region:"north",
	cls:"header",
	alias:"widget.sasheader",
	height:100,
	initComponent:function(){
		var logo = {
			xtype:"panel",
			html:"<img src='images/logo.png' height='50'/>",
			cls:"logo",
			height:60,
			width:770,
			border:false
		};
		var dropdown = Ext.create("RS.view.ui.DropDown");
		this.items = [logo, dropdown]		
        this.callParent(arguments);
	}
});
