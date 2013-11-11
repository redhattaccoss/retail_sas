package com.inform8.services.auth;

import com.google.gson.Gson;
import com.google.gson.JsonSyntaxException;
import com.inform8.entities.LoginResponse;
import com.inform8.entities.Response;
import com.inform8.services.Service;
import com.inform8.services.StaticConfig;

public class LoginService extends Service {
	public Response login(String username, String password){
		Response data = new Response();
		this.postData("Username", username);
		this.postData("Password", password);
		String output = "";
		try{
			output = this.post(StaticConfig.host+"/authenticate.php?call=login");
			Gson gsonData = new Gson();
			System.out.println(output);
			data = gsonData.fromJson(output, LoginResponse.class);
		}catch(JsonSyntaxException je){
			System.out.println(output);	
		}
		return data;
	}
}
