package com.example.yoyoapplication;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

public class OrgRegisterActivity extends Activity{
	
	final int SMALL = 0;
	final int MEDIUM = 1;
	final int LARGE = 2;
	
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
		String email = ((EditText)findViewById(R.id.et_org_email)).getText().toString();
		String password = ((EditText)findViewById(R.id.et_org_password)).getText().toString();
		String name = ((EditText)findViewById(R.id.et_org_name)).getText().toString();
		int orgNumber = ((EditText)findViewById(R.id.et_org_number)).getText().toString().equals("") ? 0 : Integer.parseInt(((EditText)findViewById(R.id.et_org_number)).getText().toString());
		String searchTags = ((EditText)findViewById(R.id.et_search_tags)).getText().toString();
		RadioGroup rg = (RadioGroup)findViewById(R.id.rg_org_size);
		RadioButton rb = (RadioButton)findViewById(rg.getCheckedRadioButtonId());
		String orgSize = rb.getText().toString();
		String postcode = ((EditText)findViewById(R.id.et_org_postcode)).getText().toString();
		int phoneNumber = ((EditText)findViewById(R.id.et_org_phone_number)).getText().toString().equals("") ? 0 : Integer.parseInt(((EditText)findViewById(R.id.et_org_phone_number)).getText().toString());
	}
	
}
