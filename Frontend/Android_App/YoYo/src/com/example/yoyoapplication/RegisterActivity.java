package com.example.yoyoapplication;

import java.util.ArrayList;
import java.util.HashMap;
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
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

public class RegisterActivity extends Activity{
	
	String firstName;
	String lastName;
	String gender;
	String dob;
	String postcode;
	String email;
	String password;
	
	ProgressDialog pDialog;
	
	JSONParser jParser = new JSONParser();
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.register);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void registerClick(View view) {
		firstName = ((EditText)findViewById(R.id.et_first_name)).getText().toString();
		lastName = ((EditText)findViewById(R.id.et_last_name)).getText().toString();
		RadioGroup genderGroup = (RadioGroup)findViewById(R.id.rg_gender);
		gender = ((RadioButton)findViewById(genderGroup.getCheckedRadioButtonId())).getText().toString();
		dob = ((EditText)findViewById(R.id.et_dob)).getText().toString();
		postcode = ((EditText)findViewById(R.id.et_postcode)).getText().toString();
		email = ((EditText)findViewById(R.id.et_email)).getText().toString();
		password = ((EditText)findViewById(R.id.et_password)).getText().toString();
		new GetAllJobs(this).execute();
	}
	
	public void orgRegisterClick(View view) {
		startActivity(new Intent("com.example.ORGREGISTER"));
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
			params.add(new BasicNameValuePair("forename", firstName));
			params.add(new BasicNameValuePair("surname", lastName));
			params.add(new BasicNameValuePair("dob", dob));
			params.add(new BasicNameValuePair("gender", gender));
			params.add(new BasicNameValuePair("location", postcode));
			params.add(new BasicNameValuePair("username", email));
			params.add(new BasicNameValuePair("pass", password));
			
			// getting JSON string from URL
			JSONObject json = jParser.makeHTTPRequest(Urls.REGISTRATION, "POST", params);

			// Check your log cat for JSON reponse
			Log.d("All Items: ", json.toString());

			
			return null;
		}

		protected void onPostExecute(String file_url) {
			// dismiss the dialog once got all details
			pDialog.dismiss();
			
			//Log.i("BLAAAARRRGGG", "Size of array is" + itemsList.size());
			
			
		}
	}
	
}
