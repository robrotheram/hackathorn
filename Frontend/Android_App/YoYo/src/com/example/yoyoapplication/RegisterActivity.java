package com.example.yoyoapplication;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

public class RegisterActivity extends Activity{
	
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
		String firstName = ((EditText)findViewById(R.id.et_first_name)).getText().toString();
		String lastName = ((EditText)findViewById(R.id.et_last_name)).getText().toString();
		RadioGroup genderGroup = (RadioGroup)findViewById(R.id.rg_gender);
		String gender = ((RadioButton)findViewById(genderGroup.getCheckedRadioButtonId())).getText().toString();
		String dob = ((EditText)findViewById(R.id.et_dob)).getText().toString();
		String postcode = ((EditText)findViewById(R.id.et_postcode)).getText().toString();
		String email = ((EditText)findViewById(R.id.et_email)).getText().toString();
		String password = ((EditText)findViewById(R.id.et_password)).getText().toString();
	}
	
	public void orgRegisterClick(View view) {
		startActivity(new Intent("com.example.ORGREGISTER"));
	}
	
}
