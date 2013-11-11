package com.inform8.test.services.wholesaler;

import junit.framework.TestCase;

import org.junit.Test;

import com.inform8.entities.Category;
import com.inform8.entities.Response;
import com.inform8.entities.Wholesaler;
import com.inform8.entities.WholesalerResponse;
import com.inform8.services.category.NewCategoryService;
import com.inform8.services.wholesaler.DeleteAllWholesalerService;
import com.inform8.services.wholesaler.NewWholesalerService;

public class TestNewWholesalerService extends TestCase {
	public void setUp(){
		//just testing
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
	}
	@Test
	/**
	 * Test New - should return Response object with result = true.
	 */
	public void testNew(){
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		NewWholesalerService ns = new NewWholesalerService();
		Wholesaler ws = new Wholesaler();
		ws.setName("Love JK");
		ws.setContactEmail("lovejk@inform8.com");
		ws.setContactName("Ryan Henderson");
		ws.setWebsite("http://www.inform8.com");
		ws.setRating("3");
		ws.setUsername("ryan");
		ws.setPassword("test");
		ws.setWholesalerTypeId(1);
		WholesalerResponse response = (WholesalerResponse) ns.create(ws);
		assertTrue(response.isResult());
	}
	@Test
	/**
	 * Test New - should return Response object with result = true and Category object was returned
	 */
	public void testNewWithWholesalerObject(){
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		NewWholesalerService ns = new NewWholesalerService();
		Wholesaler ws = new Wholesaler();
		ws.setName("Love JK");
		ws.setContactEmail("lovejk@inform8.com");
		ws.setContactName("Ryan Henderson");
		ws.setWebsite("http://www.inform8.com");
		ws.setRating("3");
		ws.setUsername("ryan");
		ws.setPassword("test");
		ws.setWholesalerTypeId(1);
		WholesalerResponse response = (WholesalerResponse) ns.create(ws);
		assertTrue(response.getWholesaler()!=null);
	}
	
	@Test
	/**
	 * Test New - should return Response object with result = true and Category object was returned
	 */
	public void testNewWithWholesalerObjectAndLoveJKAsName(){
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		NewWholesalerService ns = new NewWholesalerService();
		Wholesaler ws = new Wholesaler();
		ws.setName("Love JK");
		ws.setContactEmail("lovejk@inform8.com");
		ws.setContactName("Ryan Henderson");
		ws.setWebsite("http://www.inform8.com");
		ws.setRating("3");
		ws.setUsername("ryan");
		ws.setPassword("test");
		ws.setWholesalerTypeId(1);
		WholesalerResponse response = (WholesalerResponse) ns.create(ws);
		assertTrue(response.getWholesaler().getName().equals("Love JK"));
	}
	
	@Test
	/**
	 * Test Get All - should return an error object with code 'required'.
	 */
	public void testRequiredFields(){
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		NewWholesalerService ns = new NewWholesalerService();
		Wholesaler ws = new Wholesaler();
		ws.setName("Love JK");
		ws.setContactName("Ryan Henderson");
		ws.setWebsite("http://www.inform8.com");
		ws.setWholesalerTypeId(1);
		WholesalerResponse response = (WholesalerResponse) ns.create(ws);
		assertNotNull(response.getErrors());
	}
}
