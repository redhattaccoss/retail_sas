Ext.define("RS.transact.product.ProductEncoder", {
	encode:function(data){
		console.log(data.responseText)
		data = Ext.decode(data.responseText);
		var product = Ext.create("RS.model.Product");
		product.set("id", data.id);
		product.set("name", data.name);
		product.set("shortUrl", data.shortUrl);
		var productOptions = [];
		var i = 0;
		Ext.each(data.options, function(productOption){
			var temp = Ext.create("RS.model.ProductOption");
			temp.set("id", productOption.id);
			temp.set("wholesaleActive", productOption.wholesaleActive);
			temp.set("size", productOption.size);
			temp.set("colour", productOption.colour);
			temp.set("price", productOption.price);
			temp.set("rrp", productOption.rrp);
			productOptions[i++] = temp;
		});
		product.set("options", productOptions);
		product.set("description", data.description);
		product.set("materials", data.materials);
		return product;
	}
});