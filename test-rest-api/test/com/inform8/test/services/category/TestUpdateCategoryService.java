package com.inform8.test.services.category;

import org.junit.Test;

import com.inform8.entities.Category;
import com.inform8.entities.CategoryResponse;
import com.inform8.entities.Response;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.GetCategoryService;
import com.inform8.services.category.NewCategoryService;
import com.inform8.services.category.UpdateCategoryService;

import junit.framework.TestCase;

public class TestUpdateCategoryService extends TestCase {
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
	@Test
	/**
	 * Test Update - once update it should match the word Froogle when once retrieved again from the db.
	 */
	public void testUpdate(){
		GetCategoryService gs = new GetCategoryService();
		Category category = gs.get(Integer.parseInt(response.getNpk()));
		UpdateCategoryService us = new UpdateCategoryService();
		category.setName("Froogle");
		us.updateCategory(category);
		//after update, retrieve again from db
		category = gs.get(Integer.parseInt(response.getNpk()));
		assertTrue(category.getName().equals("Froogle"));
	}
	@Test
	/**
	 * Test Update With Category object - once update it should return an object.
	 */	
	public void testUpdateWithCategoryObject(){
		GetCategoryService gs = new GetCategoryService();
		Category category = gs.get(Integer.parseInt(response.getNpk()));
		
		System.out.println(category.getShortUrl());
		UpdateCategoryService us = new UpdateCategoryService();
		category.setName("Froogle");
		CategoryResponse response = (CategoryResponse) us.updateCategory(category);
		assertNotNull(response.getCategory());
	}
}
