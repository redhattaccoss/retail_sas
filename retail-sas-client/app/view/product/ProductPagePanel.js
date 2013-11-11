Ext.define("RS.view.product.ProductPagePanel", {
	extend:"Ext.panel.Panel",
	alias:"widget.productPage",
	pageHeaderTemplate:null,
	descriptionAndInfoTemplate:null,
	pageHeader:null,
	descriptionAndInfo:null,
	productId:0,
	imageContainerTemplate:null,
	imageContainer:null,
	layout:{
		type:"border"	
	},	
	border:false,
	cls:"product-page",
	height:400,
	id:"productPagePanelInformation",
	initComponent:function(){
		var pageHeaderTemplate = new Ext.XTemplate("<h1 class='name'>{name}</h1>",
													"<h1 id='price' class='price'>{price}</h1>");
		pageHeaderTemplate.compile();
		this.pageHeaderTemplate = pageHeaderTemplate;
		var quantities = Ext.create('Ext.data.Store', {
		    fields: ['value', 'quantity'],
		    data : [
		        {value:1, quantity:1},
		        {value:2, quantity:2},
		        {value:3, quantity:3},
		        {value:4, quantity:4},
		        {value:5, quantity:5}
		    ]
		});
		
		var options = Ext.create('Ext.data.Store', {
		    fields: ['value', 'label']
		});
		
		var productOptions = Ext.create("Ext.form.ComboBox", {
			fieldLabel:"Select Size",
			store:options,
			queryMode:'local',
			displayField:'label',
			valueField:'value',
			id:"sizeProductPage",
			labelStyle: 'width:220px'
		});
		
		
		var quantityBox = Ext.create("Ext.form.ComboBox", {
			fieldLabel:"Select Quantity",
			store:quantities,
			queryMode:'local',
			displayField:'quantity',
			valueField:'value',
			id:"quantityProductPage",
			labelStyle: 'width:220px'
		});
		
		
		
		var addToBag = Ext.create("Ext.button.Button", {
			text:"Add to bag",
			action:"addtobag"
		});
		
		var descriptionAndInfoTemplate = new Ext.XTemplate("<div class='description'><p>{description}</p></div>",
													"<h2 class='information-header'>Information</h2>",
													"<div class='materials'><p>Materials: {materials}</p></div>"
										);
										
										
		descriptionAndInfoTemplate.compile();
		this.descriptionAndInfoTemplate = descriptionAndInfoTemplate;
		this.pageHeader = Ext.create("Ext.panel.Panel", {
			height:56,
			border:false
		});
		this.descriptionAndInfo = Ext.create("Ext.panel.Panel", {
			border:false,
			height:200
		});
		
		var detailPanel = Ext.create("Ext.panel.Panel", {
			items:[this.pageHeader, productOptions, quantityBox, addToBag, this.descriptionAndInfo],
			region:"east",
			width:460,
			border:false,
			cls:"productPageDetailedPanel"
		})
		
		var imageContainerTemplate = new Ext.XTemplate("<div class='picture-container productPagePictureContainer'><img src='{picture}'/></div>");
		imageContainerTemplate.compile();
		
		var imagePanel = Ext.create("Ext.panel.Panel", {
			region:"center",
			width:300,
			border:false
		});
		
		this.imageContainer = imagePanel;
		this.imageContainerTemplate = imageContainerTemplate;
		
		this.items = [imagePanel, detailPanel];		
		this.callParent(arguments);	
		
	}, 
	update:function(productId){
		var me = this;
		me.productId = productId;
		function updateCallback(result, request, jsonresult){
			var data = result.responseText;
			data = Ext.decode(data);
			 
			
			var options = new Array();
			
			var count = 0;
			Ext.Array.each(data.options, function(productOption, index, productOptions){
				count++;
				options[index] = {label: productOption.size.name, value:productOption};				
			});
			
			var sizeProductCombo = Ext.ComponentQuery.query("#sizeProductPage");
			sizeProductCombo = sizeProductCombo[0];
			if (count>1){
				sizeProductCombo.getStore().loadData(options);
				data.price = "<span class='instruction' id='price-span-product-page'>Select from the options below for price information.</span>";
			}else{
				if (options[0].saleWholesalePrice!=null){
					data.price = "<span id='price-span-product-page'>$ "+ options[0].saleWholesalePrice+"</span>";
				}else{
					data.price = "<span id='price-span-product-page'>$ "+ options[0].wholesalePrice+"</span>";
				}
				sizeProductCombo.hide();
			}
			
			var displayImage = null;
			Ext.Array.each(data.images, function(image, index, images){
				displayImage = image;	
				return false;
			});
			
			if (displayImage!=null){
				data.picture = imageUrl+"/"+data.id+"/"+displayImage.url;
			}else{
				data.picture = "";
			}
			
			me.pageHeaderTemplate.overwrite(me.pageHeader.body, data);
			me.descriptionAndInfoTemplate.overwrite(me.descriptionAndInfo.body, data);
			me.imageContainerTemplate.overwrite(me.imageContainer.body, data);
			//change viewport to product page...
			Navigation.navigate("productPage");
		}
		var service = Ext.create("RS.transact.product.GetProductService");
		service.callback = updateCallback;
		service.run(productId);
	}
})
