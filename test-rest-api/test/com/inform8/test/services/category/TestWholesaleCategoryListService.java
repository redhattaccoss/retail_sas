package com.inform8.test.services.category;

import java.util.List;

import junit.framework.TestCase;

import org.junit.Test;

import com.inform8.entities.Category;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.NewCategoryService;
import com.inform8.services.category.WholesaleCategoryListService;

public class TestWholesaleCategoryListService extends TestCase {
	
	private String[] names = {"Books", "Children's Book", "Toys", "Apparel", "Paper", "Pencil"};
	private String[] enabled = {"1", "0", "1", "1", "1", "0"};
	private String[] wholesaleEnabled = {"0", "1", "1", "0", "1", "0"};
	private String[] shortUrl = {"http://books.com.au", "http://childrensbook.com.au", "http://toys.com.au", "http://apparel.com.au", "http://paper.com.au", "http://pencil.com.au"};
		
	
	public void setUp(){
		//just testing
		DeleteCategoryService ds = new DeleteCategoryService();
		ds.deleteAll();
		NewCategoryService ns = new NewCategoryService();
		for(int i=0;i<names.length;i++){
			Category category = new Category();
			category.setName(names[i]);
			category.setShortUrl(shortUrl[i]);
			category.setEnabled(enabled[i]);
			category.setWholesaleEnabled(wholesaleEnabled[i]);
			ns.createCategory(category);
		}
	}
	
	@Test
	/**
	 * Test Get All - Test for GetAll method of CategoryService
	 * should return 3 Category Objects.
	 */
	public void testGetAll(){
		WholesaleCategoryListService ls = new WholesaleCategoryListService();
		List<Category> list = ls.getAll();
		assertEquals("Result", 3, list.size());
	}
	@Test
	/**
	 * Test Get All Enabled - Test for GetAllEnabled method of CategoryService 
	 * should return 2 Category Object
	 */
	public void testGetAllEnabled(){
		WholesaleCategoryListService ls = new WholesaleCategoryListService();
		List<Category> list = ls.getAllEnabled();
		assertEquals("Result", 2, list.size());
	}
	
}