package com.inform8.test.services.category;

import org.junit.Test;

import com.inform8.entities.Category;
import com.inform8.entities.CategoryResponse;
import com.inform8.entities.Response;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.NewCategoryService;
import com.inform8.entities.Error;

import junit.framework.TestCase;

public class TestNewCategoryService extends TestCase {
	public void setUp(){
		DeleteCategoryService ds = new DeleteCategoryService();
		ds.deleteAll();
	}
	@Test
	/**
	 * Test New - should return Response object with result = true.
	 */
	public void testNew(){
		NewCategoryService ns = new NewCategoryService();
		Category category = new Category();
		category.setName("Book");
		category.setShortUrl("http://www.froogle.com");
		category.setEnabled("1");
		CategoryResponse response = (CategoryResponse) ns.createCategory(category);
		assertTrue(response.isResult());
	}
	
	
	@Test
	/**
	 * Test New - should return Response object with result = true and Category object was returned
	 */
	public void testNewWithCategoryObject(){
		NewCategoryService ns = new NewCategoryService();
		Category category = new Category();
		category.setName("Book");
		category.setShortUrl("http://www.froogle.com");
		category.setEnabled("1");
		CategoryResponse response = (CategoryResponse) ns.createCategory(category);
		assertTrue(response.getCategory()!=null);
	}
	
	@Test
	/**
	 * Test Get All - should return an error object with code 'required'.
	 */
	public void testRequiredFields(){
		NewCategoryService ns = new NewCategoryService();
		Category category = new Category();
		category.setEnabled("1");
		Response response = ns.createCategory(category);
		assertNotNull(response.getErrors());
	}
	
	@Test
	/**
	 * Test Required Fields Reported - should return error object with attribute field = name.
	 */
	public void testRequiredFieldsReported(){
		NewCategoryService ns = new NewCategoryService();
		Category category = new Category();
		category.setEnabled("1");
		category.setShortUrl("xyz.com");
		Response response = ns.createCategory(category);
		boolean found = false;
		outer:
		for(Error err:response.getErrors()){
			if (err.getField().equals("name")){
				found = true;
				break outer;
			}
		}
		assertTrue(found);
	}
	
}
