package com.example.yoyoapplication;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;

public class LoginActivity extends Activity{
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.login);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void loginClick(View view) {
		String username = ((EditText)findViewById(R.id.et_username)).getText().toString();
		String password = ((EditText)findViewById(R.id.et_password)).getText().toString();
	}
	
}
