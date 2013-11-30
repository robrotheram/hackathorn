package com.example.yoyoapplication;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import com.example.yoyoapplication.comms.JSONParser;
import com.example.yoyoapplication.comms.Urls;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

public class OrgRegisterActivity extends Activity{
	
	ProgressDialog pDialog;
	
	String email;
	String password;
	String name;
	int orgNumber;
	String searchTags;
	String orgSize;
	String postcode;
	int phoneNumber;
	boolean success = false;
	
	JSONParser jParser = new JSONParser();
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.org_register);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void orgRegisterClick(View view) {
		email = ((EditText)findViewById(R.id.et_org_email)).getText().toString();
		password = ((EditText)findViewById(R.id.et_org_password)).getText().toString();
		name = ((EditText)findViewById(R.id.et_org_name)).getText().toString();
		orgNumber = ((EditText)findViewById(R.id.et_org_number)).getText().toString().equals("") ? 0 : Integer.parseInt(((EditText)findViewById(R.id.et_org_number)).getText().toString());
		searchTags = ((EditText)findViewById(R.id.et_search_tags)).getText().toString();
		RadioGroup rg = (RadioGroup)findViewById(R.id.rg_org_size);
		RadioButton rb = (RadioButton)findViewById(rg.getCheckedRadioButtonId());
		orgSize = rb.getText().toString();
		postcode = ((EditText)findViewById(R.id.et_org_postcode)).getText().toString();
		phoneNumber = ((EditText)findViewById(R.id.et_org_phone_number)).getText().toString().equals("") ? 0 : Integer.parseInt(((EditText)findViewById(R.id.et_org_phone_number)).getText().toString());
		new GetAllJobs(this).execute();
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
			params.add(new BasicNameValuePair("orgname", name));
			params.add(new BasicNameValuePair("field", Integer.valueOf(orgNumber).toString()));
			params.add(new BasicNameValuePair("subfield", searchTags));
			params.add(new BasicNameValuePair("size", orgSize));
			params.add(new BasicNameValuePair("loc", postcode));
			params.add(new BasicNameValuePair("conPhone", Integer.valueOf(phoneNumber).toString()));
			params.add(new BasicNameValuePair("username", email));
			params.add(new BasicNameValuePair("pass", password));
			
			// getting JSON string from URL
			JSONObject json = jParser.makeHTTPRequest(Urls.ORG_REGISTRATION, "POST", params);

			// Check your log cat for JSON reponse
			Log.d("All Items: ", json.toString());

			try {
				// Check if it were a success
				
				success = json.getString("success") != null ? true : false; 
	
			} catch (JSONException e) {
				e.printStackTrace();
			}
			
			return null;
		}

		protected void onPostExecute(String file_url) {
			// dismiss the dialog once got all details
			pDialog.dismiss();
			
			//Log.i("BLAAAARRRGGG", "Size of array is" + itemsList.size());
			
			if (success) {
				Toast.makeText(getApplication(), "User created!", Toast.LENGTH_LONG).show();
			}
			
		}
	}
	
}
