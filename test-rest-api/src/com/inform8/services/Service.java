package com.inform8.services;
import java.net.*;
import java.util.ArrayList;
import java.util.Properties;
import java.io.*;

public abstract class Service {
	private URL loader;
	
	private Properties properties;
	
	
	private ArrayList<PostData> postData;
	
	public Service(){
		this.postData = new ArrayList<PostData>();
		this.loadSetup();
	}
	
	private void loadSetup(){
		properties = new Properties();
		try {
			properties.load(new FileInputStream("build.properties"));
			StaticConfig.host = properties.getProperty("test.server").trim();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
	protected String load(String url){
		String output = "";
		try {
			loader = new URL(url);
			return loadOutput();
		} catch (MalformedURLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return output;
	}

	private String loadOutput() throws IOException {
		String output = "";
		String inputLine = "";
		BufferedReader in = new BufferedReader(new InputStreamReader(loader.openStream()));
		while((inputLine = in.readLine())!=null){
			output+=inputLine;
		}
		in.close();

		return output;
	}
	
	
	protected void postData(String key, String value){
		PostData postData = new PostData();
		postData.setKey(key);
		postData.setValue(value);
		this.postData.add(postData);
	}
	
	
	protected String post(String url){
		try {
			
			String data = "";
			for(PostData postData:this.postData){
				if (postData!=null){
					data += (URLEncoder.encode(postData.getKey(), "UTF-8")+"="+URLEncoder.encode(postData.getValue(), "UTF-8") + "&");
				}
			}
			System.out.println("Request: "+data);
			loader = new URL(url);
			URLConnection conn = loader.openConnection();
			conn.setDoOutput(true);
		    OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
		    wr.write(data);
		    wr.flush();
		    wr.close();
		    // Get the response
		    BufferedReader rd = new BufferedReader(new InputStreamReader(conn.getInputStream()));
		    String output = "";
		    String line;
		    while ((line = rd.readLine()) != null) {
		        // Process line...
		    	output+=line;
		    }
			return output;
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return "";
	}
}
