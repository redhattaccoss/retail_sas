Ext.define("RS.controller.Main", {
	extend:"Ext.app.Controller",
	stores:[
		"CategoriesTreeStore"
	], 
	views:[
		"ui.Navigation",
		"ui.CategoriesPanel",
		"ui.ContentPanel",
		"ui.ProductAccordionPanel",
		"ui.Header",
		"ui.DropDown",
		"category.List",
		"category.CategoryAccordionPanel"
	]
});