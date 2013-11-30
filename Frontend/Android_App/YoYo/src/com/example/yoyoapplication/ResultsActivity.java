package com.example.yoyoapplication;

import android.app.Activity;
import android.graphics.Point;
import android.os.Bundle;
import android.view.Display;
import android.view.Menu;
import android.widget.LinearLayout;
import android.widget.TextView;

public class ResultsActivity extends Activity{
	
	int RESULT_PADDING = 5;
	
	int screenWidth;
	int screenHeight;
	
	LinearLayout jobResultsLayout;
	LinearLayout internshipResultsLayout;
	LinearLayout volunteerResultsLayout;
	LinearLayout courseResultsLayout;
	LinearLayout extraCurricularResultsLayout;
	LinearLayout mentoringResultsLayout;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.results);
		initVariables();
		initUI();
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	private void initVariables() {
		Display display = getWindowManager().getDefaultDisplay();
		Point size = new Point();
		screenWidth = display.getWidth();
		screenHeight = display.getHeight();
		jobResultsLayout = (LinearLayout)findViewById(R.id.job_results);
		internshipResultsLayout = (LinearLayout)findViewById(R.id.internship_results);
		volunteerResultsLayout = (LinearLayout)findViewById(R.id.volunteer_results);
		courseResultsLayout = (LinearLayout)findViewById(R.id.courses_results);
		extraCurricularResultsLayout = (LinearLayout)findViewById(R.id.extra_curricular_results);
		mentoringResultsLayout = (LinearLayout)findViewById(R.id.mentoring_results);
	}
	
	private void initUI() {
		TextView tv = new TextView(this);
		tv.setText("Hello World!");
		jobResultsLayout.addView(tv);
	}
	
}
