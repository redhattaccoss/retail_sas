package com.inform8.services.shoppingbag;

import com.inform8.entities.Response;
import com.inform8.services.Service;

public class AddLineItemService extends Service {
	public Response add(int productOptionId, int quantity){
		Response data = new Response();
		this.postData("productOptionId", ""+productOptionId);
		this.postData("quantity", ""+quantity);
		
		return data;		
	}
}