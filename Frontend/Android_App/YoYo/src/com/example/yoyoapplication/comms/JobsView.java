package com.example.yoyoapplication.comms;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.example.yoyoapplication.R;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class JobsView extends Activity {
	
	ProgressDialog pDialog;
	
	JSONParser jParser = new JSONParser();

	//public final static String ORGANISATIONS = "http://54.243.57.127/YoYo/getOrgs.php";
	public final static String AGGREGATE_SEARCH = "http://54.243.57.127/YoYo/aggregate_search.php";
	//public final static String JSON_TEST = "http://ip.jsontest.com/";
	
	//JSON Tags
	private static final String TAG_JOBS = "jobs";
	private static final String TAG_TITLE = "title";
	
	ListView list;
	
	//Make an arrayList containing all items
	ArrayList<String> itemsList;
	
	//items array
	JSONArray items = null;
	
	String searchTerm;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.jobs);
		
		Intent i = getIntent();
		searchTerm = i.getStringExtra("search");
		
		list = (ListView) findViewById(R.id.jobsList);
		itemsList = new ArrayList<String>();
		
		new GetAllJobs(this).execute();
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void displayAllItems(){
		String[] text = new String[itemsList.size()];
		for(int i = 0; i < itemsList.size(); i++){
			text[i]=(itemsList.get(i));
		}
		ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, 
				android.R.layout.simple_list_item_1, android.R.id.text1, text);
		list.setAdapter(adapter);
	}
	
	class GetAllJobs extends AsyncTask<String, String, String>{

		private Context c;

		public GetAllJobs(Activity t){
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
			params.add(new BasicNameValuePair("keyword", searchTerm));
			
			// getting JSON string from URL
			JSONObject json = jParser.makeHTTPRequest(AGGREGATE_SEARCH, "POST", params);

			// Check your log cat for JSON reponse
			Log.d("All Items: ", json.toString());

			try {
				// Checking for SUCCESS TAG
					// products found
					// Getting Array of Products
					items = json.getJSONArray(TAG_JOBS);

					// looping through All Products
					for (int i = 0; i < items.length(); i++) {
						JSONObject c = items.getJSONObject(i);

						// Storing each json item in variable
						String title = c.getString("title");

						// creating new HashMap
						HashMap<String, String> map = new HashMap<String, String>();

						// adding each child node to HashMap key => value
						map.put("Title", title);

						// adding HashList to ArrayList
						itemsList.add(title);
					}
				
			} catch (JSONException e) {
				e.printStackTrace();
			}
			return null;
		}

		protected void onPostExecute(String file_url) {
			// dismiss the dialog once got all details
			pDialog.dismiss();
			
			//Log.i("BLAAAARRRGGG", "Size of array is" + itemsList.size());
			
			displayAllItems();
		}
	}
}
