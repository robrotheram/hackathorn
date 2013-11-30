package com.example.yoyoapplication;

import org.json.JSONObject;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.TextView;

public class MainActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void discoverClick(View view) {
		startActivity(new Intent("com.example.RESULTS"));
	}
	
	public void registerClick(View view) {
		startActivity(new Intent("com.example.REGISTER"));
	}
	
	public void loginClick(View view) {
		startActivity(new Intent("com.example.LOGIN"));
	}
	
	public void test(View view) {
		String JSON = QueryDatabase.getJSON(QueryDatabase.JSON_TEST);
		//((TextView)findViewById(R.id.test)).setText(JSON);
		if (JSON.equals("")) {
			((TextView)findViewById(R.id.test)).setText("Nothing");
		} else {
			((TextView)findViewById(R.id.test)).setText("Something");
		}
	}
	
}
