package com.example.yoyoapplication;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;

public class OrgRegisterActivity extends Activity{
	
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
		
	}
	
}
