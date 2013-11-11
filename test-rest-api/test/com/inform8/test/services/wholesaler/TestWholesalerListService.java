package com.inform8.test.services.wholesaler;

import java.util.List;

import org.junit.Test;

import com.inform8.entities.Wholesaler;
import com.inform8.services.wholesaler.DeleteAllWholesalerService;
import com.inform8.services.wholesaler.GetWholesalerService;
import com.inform8.services.wholesaler.NewWholesalerService;

import junit.framework.TestCase;

public class TestWholesalerListService extends TestCase {
	public void setUp(){
		//just testing
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
	}
	
	@Test
	/**
	 * Test Get All Enabled - Should evaluate to 1. In the test, we attempt to create 3 records,
	 * 1 is enabled while the other 2 are not enabled. At the end of the test, the test should
	 * evaluate as 1 for there is only 1 enabled wholesalers...
	 */
	public void testGetAllEnabled(){
		//reset
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		//attempts to add new record
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
		ws.setEnabled("1");
		Wholesaler ws2 = new Wholesaler();
		ws2.setName("Love JK 2");
		ws2.setContactEmail("slasher@inform8.com");
		ws2.setContactName("Allanaire Tapion");
		ws2.setWebsite("http://www.inform8.com");
		ws2.setRating("3");
		ws2.setUsername("allanaire");
		ws2.setPassword("test");
		ws2.setWholesalerTypeId(1);
		Wholesaler ws3 = new Wholesaler();
		ws3.setName("Love JK 3");
		ws3.setContactEmail("slasher@inform8.com");
		ws3.setContactName("Foo Biz Baz");
		ws3.setWebsite("http://www.inform8.com");
		ws3.setRating("3");
		ws3.setUsername("foo");
		ws3.setPassword("test");
		ws3.setWholesalerTypeId(1);
		ns.create(ws);
		ns.create(ws2);
		ns.create(ws3);
		//get all wholesalers which are enabled
		GetWholesalerService gws = new GetWholesalerService();
		List<Wholesaler> wholesalers = gws.getAllEnabled();
		assertTrue(wholesalers.size()==1);
	}
	
	/**
	 * Test Get All - Should evaluate to 3. In the test, we attempt to create 3 records.
	 * At the end of the test, the test should evaluate as 3...
	 */
	public void testGetAll(){
		//reset
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		//attempts to add new record
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
		ws.setEnabled("1");
		Wholesaler ws2 = new Wholesaler();
		ws2.setName("Love JK 2");
		ws2.setContactEmail("slasher@inform8.com");
		ws2.setContactName("Allanaire Tapion");
		ws2.setWebsite("http://www.inform8.com");
		ws2.setRating("3");
		ws2.setUsername("allanaire");
		ws2.setPassword("test");
		ws2.setWholesalerTypeId(1);
		Wholesaler ws3 = new Wholesaler();
		ws3.setName("Love JK 3");
		ws3.setContactEmail("slasher@inform8.com");
		ws3.setContactName("Foo Biz Baz");
		ws3.setWebsite("http://www.inform8.com");
		ws3.setRating("3");
		ws3.setUsername("foo");
		ws3.setPassword("test");
		ws3.setWholesalerTypeId(1);
		ns.create(ws);
		ns.create(ws2);
		ns.create(ws3);
		//get all wholesalers which are enabled
		GetWholesalerService gws = new GetWholesalerService();
		List<Wholesaler> wholesalers = gws.getAll();
		assertTrue(wholesalers.size()==3);
	}
	
	
}
