package com.example.yoyoapplication;

import java.util.ArrayList;
import java.util.List;

import android.app.Activity;
import android.content.res.Configuration;
import android.graphics.Point;
import android.os.Bundle;
import android.view.Display;
import android.view.Menu;
import android.widget.LinearLayout;
import android.widget.LinearLayout.LayoutParams;
import android.widget.TextView;

public class ResultsActivity extends Activity{
	
	int RESULT_PADDING = 5;
	
	int screenWidth;
	int screenHeight;
	int numLinesOfResults;
	int numResultsInLines;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.results);
		//initVariables();
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
	
	private void initUI() {
		// Create the topmost container and parameters
		LinearLayout containerLayout = new LinearLayout(this);
		LayoutParams containerParams = new LinearLayout.LayoutParams(LayoutParams.MATCH_PARENT, LayoutParams.MATCH_PARENT);
		containerLayout.setOrientation(LinearLayout.VERTICAL);
		containerLayout.setLayoutParams(containerParams);
		
		// Create number of results
		// (six for now)
		Display display = getWindowManager().getDefaultDisplay();
		// List for the horizontal lists
		List<LinearLayout> resultLayoutList = new ArrayList<LinearLayout>();
		LayoutParams resultLayoutListParams = new LinearLayout.LayoutParams(LayoutParams.MATCH_PARENT, LayoutParams.MATCH_PARENT);
		LayoutParams resultLayoutParams;
		if (display.getOrientation() == Configuration.ORIENTATION_LANDSCAPE) {
			resultLayoutParams = new LinearLayout.LayoutParams(screenWidth/3 + RESULT_PADDING, screenWidth/3 + RESULT_PADDING);
			numLinesOfResults = 2;
			numResultsInLines = 3;
		} else {
			resultLayoutParams = new LinearLayout.LayoutParams(screenWidth/2 + RESULT_PADDING, screenWidth/2 + RESULT_PADDING);
			numLinesOfResults = 3;
		}
		for (int i = 0; i < numLinesOfResults; i++) {
			resultLayoutList.add(new LinearLayout(this));
		}
		List<LinearLayout> layoutList = new ArrayList<LinearLayout>();
		for (int i = 0; i < 6; i++) {
			layoutList.add(new LinearLayout(this));
		}
		for (int i = 0; i < resultLayoutList.size(); i++) {
			for (int j = 0; j < numResultsInLines; j++) {
				TextView tv = new TextView(this);
				tv.setText("Hello World!");
				LinearLayout tempL = layoutList.get(i + (i + j));
				tempL.addView(tv);
				tempL.setLayoutParams(resultLayoutParams);
				resultLayoutList.get(i).addView(tempL);
			}
		}
		for (LinearLayout layout : resultLayoutList) {
			layout.setLayoutParams(resultLayoutListParams);
			containerLayout.addView(layout);
		}
		
		// Testing shit

		
		// Adding views
		this.addContentView(containerLayout, containerParams);
	}
	
}
