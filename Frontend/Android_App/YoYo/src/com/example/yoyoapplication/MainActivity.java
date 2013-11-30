package com.example.yoyoapplication;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;

public class MainActivity extends Activity {
	
	EditText entryBox;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main);
		
		entryBox = (EditText) findViewById(R.id.edit_job);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void discoverClick(View view) {
		//startActivity(new Intent("com.example.RESULTS"));
		String text = entryBox.getText().toString();
		if(text == null){
			text = "";
		}
		Intent i = new Intent("com.example.JOBS");
		i.putExtra("search", text);
		startActivity(i);
	}
	
	public void registerClick(View view) {
		startActivity(new Intent("com.example.REGISTER"));
	}
	
	public void loginClick(View view) {
		startActivity(new Intent("com.example.LOGIN"));
	}
	
}
