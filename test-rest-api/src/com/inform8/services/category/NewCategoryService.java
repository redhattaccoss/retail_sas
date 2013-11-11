package com.inform8.services.category;

import com.google.gson.Gson;
import com.google.gson.JsonSyntaxException;
import com.inform8.entities.Category;
import com.inform8.entities.CategoryResponse;
import com.inform8.entities.Response;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class NewCategoryService extends Service {
	public Response createCategory(Category category){
		CategoryResponse data = new CategoryResponse();
		this.postData("name", category.getName());
		this.postData("shortUrl", category.getShortUrl());
		this.postData("id", ""+category.getId());
		this.postData("enabled",category.isEnabled());
		this.postData("topPromoHtml", category.getTopPromoHtml());
		this.postData("bottomPromoHtml", category.getBottomPromoHtml());
		this.postData("viewOrder", ""+category.getViewOrder());
		this.postData("wholesaleEnabled", category.isWholesaleEnabled());
		String output = "";
		try{
			output = this.post(StaticConfig.host+"/rest.php?call=/category/new");
			Gson gsonData = new Gson();
			System.out.println(output);
			data = gsonData.fromJson(output, CategoryResponse.class);
		}catch(JsonSyntaxException je){
			System.out.println(output);	
		}
		return data;
	}
}
