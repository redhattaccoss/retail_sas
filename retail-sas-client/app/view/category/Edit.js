Ext.define("RS.view.category.Edit", {
	extend:"Ext.window.Window",
	autoShow:true,
	layout:"fit",
	alias:"widget.categoryeditwindow",
	action:"save",
	modal:true,
	initComponent:function(){
		this.items = [{
			xtype:"form",
			defaultType:"textfield",			
			items:[
				{
					name:"name",
					fieldLabel:"Name",
					allowBlank:false
				},
				{
					name:"shortUrl",
					fieldLabel:"Short Url",
					allowBlank:false
				},
				{
					name:"enabled",
					fieldLabel:"Enabled",
					xtype:"checkbox"
				}
			]
		}];
		this.buttons = [
            {
                text: 'Save',
                action: this.action,
                scope:this
            },
            {
                text: 'Cancel',
                scope: this,
                handler: this.close
            }
        ];
        this.callParent(arguments);
	}
});
