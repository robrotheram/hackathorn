package com.example.yoyoapplication;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.params.BasicHttpParams;

public class QueryDatabase {

	public final static String ORGANISATIONS = "http://54.243.57.127/YoYo/getOrgs.php";
	public final static String AGGREGATE_SEARCH = "http://54.243.57.127/YoYo/aggregate_search.php";
	public final static String JSON_TEST = "http://ip.jsontest.com/";
	
	/*
	public static String getJSON(String url, String query) {
		String fullURL = url + "?" + query;
		return null;
	}
	*/
	
	public static String getJSON(String url) {
		DefaultHttpClient httpClient = new DefaultHttpClient(new BasicHttpParams());
		HttpPost httpPost = new HttpPost(url);
		httpPost.setHeader("Content-Type", "application/json");
		
		InputStream inputStream = null;
		String result = "";
		try {
			HttpResponse response = (HttpResponse)httpClient.execute(httpPost);
			HttpEntity entity = response.getEntity();
			
			inputStream = entity.getContent();
			BufferedReader reader = new BufferedReader(new InputStreamReader(inputStream, "UTF-8"), 8);
			StringBuilder builder = new StringBuilder();
			
			String line = null;
			while ((line = reader.readLine()) != null) {
				builder.append(line + "\n");
			}
			result = builder.toString();
		} catch (Exception ex) {
			
		} finally {
			try {
				if (inputStream != null) {
					inputStream.close();
				}
			} catch (Exception ex) {
				
			}
		}
		return result;
	}
	
	
	
}
