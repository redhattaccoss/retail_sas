package com.inform8.services.wholesaler;

import com.google.gson.Gson;
import com.google.gson.JsonSyntaxException;
import com.inform8.entities.Response;
import com.inform8.entities.Wholesaler;
import com.inform8.entities.WholesalerResponse;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class UpdateWholesalerService extends Service {
	public Response update(Wholesaler wholesaler){
		Response data = new Response();
		this.postData("name", wholesaler.getName());
		this.postData("contactName", wholesaler.getContactName());
		this.postData("contactEmail", wholesaler.getContactEmail());
		this.postData("blog", wholesaler.getBlog());
		this.postData("rating", wholesaler.getRating());
		this.postData("website", wholesaler.getWebsite());
		this.postData("username", wholesaler.getUsername());
		this.postData("password", wholesaler.getPassword());
		this.postData("wholesalerTypeId", ""+wholesaler.getWholesalerTypeId());
		this.postData("id", wholesaler.getId()+"");
		String output = "";
		try{
			output = this.post(StaticConfig.host+"/rest.php?call=/wholesaler/update");
			Gson gsonData = new Gson();
			System.out.println(output);
			data = gsonData.fromJson(output, WholesalerResponse.class);
		}catch(JsonSyntaxException je){
			System.out.println(output);	
		}
		return data;
	}
}
