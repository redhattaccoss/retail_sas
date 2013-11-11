package com.inform8.services.wholesaler;

import java.util.List;

import com.google.gson.Gson;
import com.inform8.entities.Wholesaler;
import com.inform8.entities.WholesalerData;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class GetWholesalerService extends Service {
	public Wholesaler get(int id){
		String result = this.load(StaticConfig.host+"/rest.php?call=/wholesaler/get&id="+id+"&detailed=1");
		System.out.println(result);
		Gson gsonData = new Gson();
		try{
			Wholesaler wholesaler = gsonData.fromJson(result,Wholesaler.class);
			return wholesaler;
		}catch(Exception e){
			return null;
		}
	}
	
	public List<Wholesaler> getAllEnabled(){
		String result = this.load(StaticConfig.host+"/rest.php?call=/wholesaler/list&enabledOnly=1");
		System.out.println(result);
		Gson gsonData = new Gson();
		try{
			WholesalerData wholesalerData = gsonData.fromJson(result,WholesalerData.class);
			return wholesalerData.getWholesalers();
		}catch(Exception e){
			return null;
		}
	}
	
	public List<Wholesaler> getAll(){
		String result = this.load(StaticConfig.host+"/rest.php?call=/wholesaler/list&enabledOnly=0");
		System.out.println(result);
		Gson gsonData = new Gson();
		try{
			WholesalerData wholesalerData = gsonData.fromJson(result,WholesalerData.class);
			return wholesalerData.getWholesalers();
		}catch(Exception e){
			return null;
		}
	}
	
	
}
