Ext.define("RS.view.product.ListBySubCategoryPanel", {
	extend:"Ext.grid.Panel",
	layout:"fit",
	store:"ListProductBySubCategory",
	initComponent:function(){
		this.columns = [
            {header: 'Name',  dataIndex: 'name',  flex: 1},
            {header: 'Short Url',  dataIndex: 'shortUrl',  flex: 1},
            {header: 'Price Low', dataIndex: 'priceLow', flex: 1},
            {header: 'Price High', dataIndex: 'priceHigh', flex: 1},
        ];
		this.callParent(arguments);
	},
	alias:"widget.productListBySubCategoryGrid"
});
