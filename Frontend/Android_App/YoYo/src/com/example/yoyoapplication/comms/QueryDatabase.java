package com.example.yoyoapplication.comms;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.util.Log;

public class QueryDatabase {
	
	ProgressDialog pDialog;
	
	JSONParser jParser = new JSONParser();

	//public final static String ORGANISATIONS = "http://54.243.57.127/YoYo/getOrgs.php";
	public final static String AGGREGATE_SEARCH = "http://54.243.57.127/YoYo/aggregate_search.php";
	//public final static String JSON_TEST = "http://ip.jsontest.com/";
	
	//JSON Tags
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_JOBS = "jobs";
	private static final String TAG_TITLE = "title";
	
	//Make an arrayList containing all items
	ArrayList<HashMap<String, String>> itemsList;
	
	//items array
	JSONArray items = null;
	
	class LoadAllItems extends AsyncTask<String, String, String>{

		private Context c;

		public LoadAllItems(Activity t){
			c = t;

		}

		protected void onPreExecute() {
			pDialog = new ProgressDialog(c);
			pDialog.setMessage("Loading details. Please wait...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		@Override
		protected String doInBackground(String... arg0) {
			// Building Parameters
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("location", "swansea"));
			params.add(new BasicNameValuePair("keyword", "doctor"));
			
			// getting JSON string from URL
			JSONObject json = jParser.makeHTTPRequest(AGGREGATE_SEARCH, "POST", params);

			// Check your log cat for JSON reponse
			Log.d("All Items: ", json.toString());

			try {
				// Checking for SUCCESS TAG
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					// products found
					// Getting Array of Products
					items = json.getJSONArray(TAG_JOBS);

					// looping through All Products
					for (int i = 0; i < items.length(); i++) {
						JSONObject c = items.getJSONObject(i);

						// Storing each json item in variable
						String title = c.getString(TAG_TITLE);

						// creating new HashMap
						HashMap<String, String> map = new HashMap<String, String>();

						// adding each child node to HashMap key => value
						map.put("Title", title);

						// adding HashList to ArrayList
						itemsList.add(map);
					}
				} else {
					//Something
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			//removeUneededItems();
			return null;
		}

		protected void onPostExecute(String file_url) {
			// dismiss the dialog once got all details
			pDialog.dismiss();
		}
	}
	
	
}
