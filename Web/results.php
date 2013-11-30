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
   				<div id="jobsBox" class="span4"><h3>jobs</h3></div>
   				<div id="coursesBox" class="span4"><h3>course</h3></div>
   				<div id="volunteerBox" class="span4"><h3>volunteer</h3></div>
   			</div>
   		</div>
   		<div class="row-fluid">
   			<div class="sortable">
   				<div id="internshipBox" class="span4"><h3>internship</h3></div>
   				<div id="extraCurrBox" class="span4"><h3>extra curricular</h3></div>
   				<div id="mentorBox" class="span4"><h3>mentors</h3></div>
   			</div>
   		</div>
   	</div>
	</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>

    	$(document).ready(function(){
    		$("#titlemenu li").click(function(){
    			$("#titlemenu li").removeClass("active");
    			$(this).addClass("active");
    		});
    	})
		
		$(document).ready(function() {
    		$( "#sortable,#sortable2" ).sortable({
        		connectWith: "#sortable,#sortable2"
   		});
    		$( "#sortable,#sortable2" ).disableSelection();
		});

    </script>

  </body>
</html>