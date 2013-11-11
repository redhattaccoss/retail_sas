package com.inform8.services.subcategory;

import java.util.List;

import com.google.gson.Gson;
import com.google.gson.JsonParseException;
import com.google.gson.JsonSyntaxException;
import com.inform8.entities.Category;
import com.inform8.entities.SubCategoryData;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class RetailSubCategoryListService extends Service {
	public List<Category> getAll(){
		String result = this.load(StaticConfig.host+"/rest.php?call=/subcategory/retail/list&enabledOnly=0");
		Gson gsonData = new Gson();
		//gsonData.fromJson(this.load("http://localhost/rest.php?call=/category/list"), Category.class);
		System.out.println(result);
		try{
			SubCategoryData data = gsonData.fromJson(result, SubCategoryData.class);
			return data.getSubCategories();
		}catch(JsonSyntaxException e){
			return null;
		}catch(JsonParseException e){
			return null;
		}
	}
	
	
	public List<Category> getAllEnabled(){
		String result = this.load(StaticConfig.host+"/rest.php?call=/subcategory/retail/list");
		Gson gsonData = new Gson();
		//gsonData.fromJson(this.load("http://localhost/rest.php?call=/category/list"), Category.class);
		System.out.println(result);
		try{
			SubCategoryData data = gsonData.fromJson(result, SubCategoryData.class);
			return data.getSubCategories();
		}catch(JsonSyntaxException e){
			return null;
		}catch(JsonParseException e){
			return null;
		}
	}
}
