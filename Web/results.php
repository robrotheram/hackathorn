<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>YoYo | Ambition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Matt" >

    <!-- Le styles -->
    <link href="./INC/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./INC/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="./yoyoambition.css" rel="stylesheet">
    <link href="./results.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
	
	<!-- Database Connect javascripts -->
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>

	<?php
		//get json from index.php to use throughout
		$data = $_POST["json"];
	?>

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.html">YoYo</a>
          <div class="nav-collapse collapse pull-right">
            <ul class="nav">
        			<li><a href="login.html">Login</a></li>
        			<li><a href="signup.html">Sign-Up</a></li>
        			<li><a href="contact.php">Contact</a></li>
              
        		</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
   <div class="container">
   	<div class="container-fluid">
   		<div class="row-fluid">
   			<div class="sortable">
   				<div id="jobsBox" class="span4">
   					<h3><a class="resultTitle" href="extendedresults.html">Jobs</a></h3>
   					<ul>

   					<!-- LIVE DATA HERE---------------------------- -->
   						<?php
   						
   							echo <li class="jobResult">$data["jobs"][0]</li>;
							echo <li class="jobResult">$data["jobs"][1]</li>;
							echo <li class="jobResult">$data["jobs"][2]</li>;  				
						?>	
           
   					</ul>
   				</div>
   				<div id="coursesBox" class="span4">
   					<h3><a class="resultTitle" href="extendedresults.html">Courses</a></h3>
						<ul>
						<!-- hard coded for demo -->
							<li class="courseResult">Course 1</li>
							<li class="courseResult">Course 2</li>
							<li class="courseResult">Course 3</li>   					
   					</ul>   				
   				</div>
   				<div id="volunteerBox" class="span4">
   					<h3><a class="resultTitle" href="extendedresults.html">Volunteering</a></h3>
   					<ul>
   					<!-- hard coded for demo -->
							<li class="volResult">Volunteer Position 1</li>
							<li class="volResult">Volunteer Position 2</li>
							<li class="volResult">Volunteer Position 3</li>   					
   					</ul>
   				</div>
   			</div>
   		</div>
   		<div class="row-fluid">
   			<div class="sortable">
   				<div id="internshipBox" class="span4">
   					<h3><a class="resultTitle" href="extendedresults.html">Internships</a></h3>
   					<ul>
   					<!-- hard coded for demo -->
							<li class="internResult">Internship 1</li>
							<li class="internResult">Internship 2</li>
							<li class="internResult">Internship 3</li>   					
   					</ul>
   				</div>
   				<div id="extraCurrBox" class="span4">
   					<h3><a class="resultTitle" href="extendedresults.html">Groups</a></h3>
						<ul>
						<!-- hard coded for demo -->
							<li class="extraCurrResult">ExtraCurricular 1</li>
							<li class="extraCurrResult">ExtraCurricular 2</li>
							<li class="extraCurrResult">ExtraCurricular 3</li>   					
   					</ul>   				
   				</div>
   				<div id="mentorBox" class="span4">
   					<h3><a class="resultTitle" href="extendedresults.html">Alumni</a></h3>
   					<!-- These should link to the alumi's user profile. -->
						<ul>
							<?php
   								$temp = $data["mentors"];
   								
   								if(count($temp) < 3){
   									$size = count($temp);
   								}
   								
   								if($size > 0){
   								 echo <li class="mentorResult">$temp[0]</li>;
   								}	
   								
   								if($size > 1){
   								 echo <li class="mentorResult">$temp[1]</li>;
   								}	
   								
   								if($size > 2){
   								 echo <li class="mentorResult">$temp[3]</li>;
   								}				
							?>	  					
   					</ul>   				
   				</div>
   				<div id="otherBox" class="span4">
   					<ul>
   						<li class="otherResult">Other Activity 1</li>
   						<li class="otherResult">Other Activity 2</li>
   						<li class="otherResult">Other Activity 3</li>
   					</ul>
   				</div>
   			</div>
   		</div>
   	</div>
	</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="./jquery.js"></script>
    <script>
		
		$(document).ready(function() {
    		$( "#sortable,#sortable2" ).sortable({
        		connectWith: "#sortable,#sortable2"
   		});
    		$( "#sortable,#sortable2" ).disableSelection();
		});

    </script>

  </body>
</html>