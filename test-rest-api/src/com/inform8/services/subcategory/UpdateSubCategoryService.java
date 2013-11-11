package com.inform8.services.subcategory;

import com.google.gson.Gson;
import com.google.gson.JsonSyntaxException;
import com.inform8.entities.Response;
import com.inform8.entities.SubCategory;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class UpdateSubCategoryService extends Service {
	public Response update(SubCategory subCategory){
		Response data = new Response();
		this.postData("name", subCategory.getName());
		this.postData("shortUrl", subCategory.getShortUrl());
		this.postData("id", ""+subCategory.getId());
		this.postData("enabled",subCategory.isEnabled());
		this.postData("topPromoHtml", subCategory.getTopPromoHtml());
		this.postData("bottomPromoHtml", subCategory.getBottomPromoHtml());
		this.postData("viewOrder", ""+subCategory.getViewOrder());
		this.postData("wholesaleEnabled", subCategory.isWholesaleEnabled());
		this.postData("categoryId", ""+subCategory.getCategoryId());
		String output = "";
		try{
			output = this.post(StaticConfig.host+"/rest.php?call=/subcategory/update");
			Gson gsonData = new Gson();
			System.out.println(output);
			data = gsonData.fromJson(output, Response.class);
		}catch(JsonSyntaxException je){
			System.out.println(output);	
		}
		return data;
	}
}
