package com.inform8.test.services.subcategory;

import org.junit.Test;

import junit.framework.TestCase;

import com.inform8.entities.Category;
import com.inform8.entities.Response;
import com.inform8.entities.SubCategory;
import com.inform8.services.category.DeleteCategoryService;
import com.inform8.services.category.GetCategoryService;
import com.inform8.services.category.NewCategoryService;
import com.inform8.services.subcategory.DeleteAllSubCategoryService;
import com.inform8.services.subcategory.NewSubCategoryService;

public class TestNewSubCategoryService extends TestCase {
	public void setUp(){
		DeleteCategoryService ds = new DeleteCategoryService();
		ds.deleteAll();
		DeleteAllSubCategoryService da = new DeleteAllSubCategoryService();
		da.deleteAll();
	}
	@Test
	/**
	 * Test Create - should create a category with 1 subcategory
	 */
	public void testCreateCategoryWithSubCategory(){
		this.setUp();
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
		GetCategoryService gs = new GetCategoryService();
		category = gs.getWithSubCategory(Integer.parseInt(response.getNpk()));
		assertTrue((category!=null)&&(category.getSubCategories().size()==1));
	}
	
	@Test
	/**
	 * Test Create - should create a category with 2 subcategory
	 */
	public void testCreateCategoryWith2SubCategory(){
		this.setUp();
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
		SubCategory subCategory2 = new SubCategory();
		subCategory2.setName("Moogle's Book");
		subCategory2.setShortUrl("http://www.moogle.com/children");
		subCategory2.setCategoryId(Integer.parseInt(response.getNpk()));
		subCategory2.setEnabled("1");
		nscs.createSubCategory(subCategory);
		nscs.createSubCategory(subCategory2);
		GetCategoryService gs = new GetCategoryService();
		category = gs.getWithSubCategory(Integer.parseInt(response.getNpk()));
		assertTrue((category!=null)&&(category.getSubCategories().size()==2));
	}
}
