package com.inform8.test.services.category;

import junit.framework.TestCase;

import com.inform8.entities.Category;
import com.inform8.entities.Response;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.GetCategoryService;
import com.inform8.services.category.NewCategoryService;

public class TestGetCategoryService extends TestCase{
	private Response response;
	public void setUp(){
		DeleteCategoryService ds = new DeleteCategoryService();
		ds.deleteAll();
		NewCategoryService ns = new NewCategoryService();
		Category category = new Category();
		category.setName("Book");
		category.setShortUrl("http://www.froogle.com");
		category.setEnabled("1");
		this.response = ns.createCategory(category);
		
	}
	public void testGet(){
		GetCategoryService gs = new GetCategoryService();
		Category category = gs.get(Integer.parseInt(response.getNpk()));
		assertNotNull(category);
	}
}
