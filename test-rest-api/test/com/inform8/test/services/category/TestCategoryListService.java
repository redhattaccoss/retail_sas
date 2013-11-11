package com.inform8.test.services.category;
import java.util.List;

import junit.framework.TestCase;

import org.junit.*;

import com.inform8.entities.Category;
import com.inform8.services.category.CategoryListService;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.NewCategoryService;

public class TestCategoryListService extends TestCase{
	public void setUp(){
		//just testing
		DeleteCategoryService ds = new DeleteCategoryService();
		ds.deleteAll();
		Category category = new Category();
		category.setName("Books");
		category.setShortUrl("http://books.com.au");
		Category category2 = new Category();
		category2.setName("Children's Book");
		category2.setShortUrl("http://childrenbooks.com.au");
		Category category3 = new Category();
		category3.setName("Hello World");
		category3.setShortUrl("http://helloworld.com.au");
		category3.setEnabled("1");
		NewCategoryService ns = new NewCategoryService();
		ns.createCategory(category);
		ns.createCategory(category2);
		ns.createCategory(category3);
	}
	
	@Test
	/**
	 * Test Get All - should return 3 Category Objects.
	 */
	public void testGetAll(){
		CategoryListService ls = new CategoryListService();
		List<Category> list = ls.getAll();
		assertEquals("Result", 3, list.size());
	}
	
	@Test
	/**
	 * Test Get All Enabled - should return 1 Category Object.
	 */
	public void testGetAllEnabled(){
		CategoryListService ls = new CategoryListService();
		List<Category> list = ls.getAllEnabled();
		assertEquals("Result", 1, list.size());
	}
}
