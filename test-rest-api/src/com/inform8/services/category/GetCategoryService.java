package com.inform8.services.category;

import com.google.gson.Gson;
import com.inform8.entities.Category;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class GetCategoryService extends Service {
	public Category get(int id){
		String result = this.load(StaticConfig.host+"/rest.php?call=/category/get&id="+id);
		System.out.println(result);
		Gson gsonData = new Gson();
		try{
			Category category = gsonData.fromJson(result,Category.class);
			return category;
		}catch(Exception e){
			return null;
		}
	}
	public Category getWithSubCategory(int id){
		String result = this.load(StaticConfig.host+"/rest.php?call=/category/get&id="+id+"&categoriesOnly=0&enabledOnly=0");
		System.out.println(result);
		Gson gsonData = new Gson();
		try{
			Category category = gsonData.fromJson(result,Category.class);
			return category;
		}catch(Exception e){
			return null;
		}
	}
	
	
	
}
