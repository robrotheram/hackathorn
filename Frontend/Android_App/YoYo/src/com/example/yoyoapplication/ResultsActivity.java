package com.example.yoyoapplication;

import java.util.ArrayList;
import java.util.List;

import android.app.Activity;
import android.content.res.Configuration;
import android.graphics.Point;
import android.os.Bundle;
import android.view.Display;
import android.view.Gravity;
import android.view.Menu;
import android.widget.LinearLayout;
import android.widget.LinearLayout.LayoutParams;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class ResultsActivity extends Activity{
	
	int RESULT_PADDING = 5;
	
	int screenWidth;
	int screenHeight;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		//initVariables();
		//testUI();
		setContentView(R.layout.results);
		//initUI();
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
	}
	
	private void testUI() {
		RelativeLayout topBar = (RelativeLayout)findViewById(R.id.bottomBar);
		RelativeLayout.LayoutParams topBarParams = new RelativeLayout.LayoutParams(screenWidth/3 - RESULT_PADDING, screenHeight/3 - RESULT_PADDING);
		topBar.setLayoutParams(topBarParams);
	}
	
	private void initUI() {
		// Create the topmost container and parameters
		RelativeLayout containerLayout = new RelativeLayout(this);
		RelativeLayout.LayoutParams containerParams = new RelativeLayout.LayoutParams(LayoutParams.WRAP_CONTENT, LayoutParams.MATCH_PARENT);
		containerLayout.setLayoutParams(containerParams);
		
		// Create top bar
		RelativeLayout topBar = new RelativeLayout(this);
		RelativeLayout.LayoutParams topBarParams = new RelativeLayout.LayoutParams(LayoutParams.MATCH_PARENT, LayoutParams.MATCH_PARENT);
		topBarParams.addRule(RelativeLayout.ALIGN_PARENT_TOP);
		topBar.setLayoutParams(topBarParams);
		
		// First results layout
		LinearLayout firstResultLayout = new LinearLayout(this);
		RelativeLayout.LayoutParams firstResultParams = new RelativeLayout.LayoutParams(LayoutParams.WRAP_CONTENT, LayoutParams.WRAP_CONTENT);
		firstResultParams.addRule(RelativeLayout.CENTER_HORIZONTAL);
		firstResultLayout.setGravity(Gravity.CENTER);
		//firstResultParams.setLayoutParams(firstResultParams);
		
		// Create bottom bar
		RelativeLayout bottomBar = new RelativeLayout(this);
		RelativeLayout.LayoutParams bottomBarParams = new RelativeLayout.LayoutParams(LayoutParams.MATCH_PARENT, LayoutParams.MATCH_PARENT);
		bottomBarParams.addRule(RelativeLayout.ALIGN_PARENT_TOP);
		bottomBar.setLayoutParams(topBarParams);
		
		// Testing shit

		
		// Adding views
		this.addContentView(containerLayout, containerParams);
	}
	
}
