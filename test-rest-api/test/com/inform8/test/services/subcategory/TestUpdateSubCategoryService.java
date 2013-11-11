package com.inform8.test.services.subcategory;

import org.junit.Test;

import com.google.gson.Gson;
import com.inform8.entities.Category;
import com.inform8.entities.Response;
import com.inform8.entities.SubCategory;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.GetCategoryService;
import com.inform8.services.category.NewCategoryService;
import com.inform8.services.subcategory.DeleteAllSubCategoryService;
import com.inform8.services.subcategory.NewSubCategoryService;
import com.inform8.services.subcategory.UpdateSubCategoryService;

import junit.framework.TestCase;

public class TestUpdateSubCategoryService extends TestCase {
	public void setUp(){
		DeleteCategoryService ds = new DeleteCategoryService();
		ds.deleteAll();
		DeleteAllSubCategoryService da = new DeleteAllSubCategoryService();
		da.deleteAll();
	}
	
	@Test
	/**
	 * Test Update - should create a category with 1 subcategory and once we update the name of the newly created,
	 * we should try to retrieve it again from the database and its name should match
	 */
	public void testUpdate(){
		NewCategoryService ns = new NewCategoryService();
		Category category = new Category();
		category.setName("Book");
		category.setShortUrl("http://www.froogle.com");
		category.setEnabled("1");
		Response response = ns.createCategory(category);
		NewSubCategoryService nscs = new NewSubCategoryService();
		SubCategory subCategory = new SubCategory();
		subCategory.setName("Children's Book");
		subCategory.setShortUrl("http://www.froogle.com/children");
		subCategory.setCategoryId(Integer.parseInt(response.getNpk()));
		subCategory.setEnabled("1");
		nscs.createSubCategory(subCategory);
		//retrieve back category from db
		GetCategoryService gs = new GetCategoryService();
		category = gs.getWithSubCategory(Integer.parseInt(response.getNpk()));
		
		subCategory = category.getSubCategories().get(0);
		subCategory.setName("Children");
		
		UpdateSubCategoryService uscs = new UpdateSubCategoryService();
		uscs.update(subCategory);
		
		
		//retrieve back category from db
		category = gs.getWithSubCategory(Integer.parseInt(response.getNpk()));
		subCategory = category.getSubCategories().get(0);
		
		assertTrue(subCategory.getName().equals("Children"));
	}
}
