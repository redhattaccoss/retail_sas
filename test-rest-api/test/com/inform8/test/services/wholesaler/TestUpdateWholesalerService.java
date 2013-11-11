package com.inform8.test.services.wholesaler;

import org.junit.Test;

import junit.framework.TestCase;

import com.inform8.entities.Response;
import com.inform8.entities.Wholesaler;
import com.inform8.entities.WholesalerResponse;
import com.inform8.services.wholesaler.DeleteAllWholesalerService;
import com.inform8.services.wholesaler.GetWholesalerService;
import com.inform8.services.wholesaler.NewWholesalerService;
import com.inform8.services.wholesaler.UpdateWholesalerService;

public class TestUpdateWholesalerService extends TestCase {
	
	private Response response;
	public void setUp(){
		//just testing
		DeleteAllWholesalerService dws = new DeleteAllWholesalerService();
		dws.deleteAll();
		Wholesaler ws = new Wholesaler();
		ws.setName("Love");
		ws.setContactEmail("lovejk@inform8.com");
		ws.setContactName("Ryan Henderson");
		ws.setWebsite("http://www.inform8.com");
		ws.setRating("3");
		ws.setUsername("ryan");
		ws.setPassword("test");
		ws.setWholesalerTypeId(1);
		NewWholesalerService nws = new NewWholesalerService();
		this.response = nws.create(ws);
	}
	
	
	@Test
	/**
	 * Test Update - 
	 */
	public void testUpdate(){
		GetWholesalerService gs = new GetWholesalerService();
		Wholesaler wholesaler = gs.get(Integer.parseInt(response.getNpk()));
		wholesaler.setName("Love JK");
		UpdateWholesalerService uws = new UpdateWholesalerService();
		WholesalerResponse response = (WholesalerResponse) uws.update(wholesaler);
		assertTrue(response.getWholesaler()!=null&&response.getWholesaler().getName().equals("Love JK"));
	}
	
	
	
}
