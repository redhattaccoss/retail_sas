Ext.define("RS.view.ui.DropDown", {
	extend:"Ext.panel.Panel",
	template:null,
	alias:"widget.mainDropdown",
	height:50,
	cls:"dropdownContainer",
	initComponent:function(){
		var me = this;
		template = new Ext.XTemplate(
							"<ul id='categoryItems' class='dropdownMenu'>",
								'<tpl for="categories">',
									"<li class='main-menu'>",
											"<a href='#' id='category-{id}' class='category-link'>{name}</a><ul>",
												'<tpl for="subCategories">',
													'<li><a href="#" onclick=\'EventDispatcher.categoryLinkClicked({id});return false;\'>{name}</a></li>',
												'</tpl>',
											"</ul>",
									"</li>",
								'</tpl>',
							"</ul>");					
		template.compile();
		var service = Ext.create("RS.transact.category.ListCategoryWithSubCategoriesService");
		service.callback = renderDropDownHandler;
		service.run();
		function renderDropDownHandler(result, request, jsonresult){
			var data = result.responseText;
			template.overwrite(me.body, Ext.decode(data));
		}
		this.callParent(arguments);
	}
});
