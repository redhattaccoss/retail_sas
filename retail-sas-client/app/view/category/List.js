Ext.define('RS.view.category.List' ,{
    extend: 'Ext.grid.Panel',
    alias : 'widget.categorylist',
    store:  "AllEnabledCategories",
    initComponent: function() {
    	var toolbar = Ext.create("Ext.toolbar.Toolbar", {
			width:400,
			items:[
				{
					text:"Add Category"					
				}
			]
		});
		this.items = [
				toolbar
		];
    	
        this.columns = [
            {header: 'Name',  dataIndex: 'name',  flex: 1},
            {header: 'Short URL', dataIndex: 'shortUrl', flex: 1}
        ];
        this.callParent(arguments);
    }
});
