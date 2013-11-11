package com.inform8.services.category;
import java.util.*;

import com.google.gson.Gson;
import com.google.gson.JsonParseException;
import com.google.gson.JsonSyntaxException;
import com.inform8.entities.Category;
import com.inform8.entities.CategoryData;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class CategoryListService extends Service {
	
	public List<Category> getAllEnabled(){
		String result = this.load(StaticConfig.host+"/rest.php?call=/category/list");
		Gson gsonData = new Gson();
		//gsonData.fromJson(this.load("http://localhost/rest.php?call=/category/list"), Category.class);
		System.out.println(result);
		try{
			CategoryData data = gsonData.fromJson(result, CategoryData.class);
			return data.getCategories();
		}catch(JsonSyntaxException e){
			return null;
		}catch(JsonParseException e){
			return null;
		}
	}
	
	public List<Category> getAll(){
		String result = this.load(StaticConfig.host+"/rest.php?call=/category/list&enabledOnly=0");
		Gson gsonData = new Gson();
		//gsonData.fromJson(this.load("http://localhost/rest.php?call=/category/list"), Category.class);
		System.out.println(result);
		try{
			CategoryData data = gsonData.fromJson(result, CategoryData.class);
			return data.getCategories();
		}catch(JsonSyntaxException e){
			return null;
		}catch(JsonParseException e){
			return null;
		}
	}
	
	
	
}
