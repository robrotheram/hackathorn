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
    <link href="./yoyoambition.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
	
	<?php
		function countryCityFromIP()
		{
			$ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
			$url = "http://api.ipinfodb.com/v3/ip-city/?key=5cfaab6c5af420b7b0f88d289571b990763e37b66761b2f053246f9db07ca913&ip=".$ipAddr."&format=json";
			$d = file_get_contents($url);
			return json_decode($d , true);
		}
			$ip = countryCityFromIP();
			$loc =  $ip['cityName'];
		  
		
	?>
	
	   <!-- Database Connect javascripts -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
	<script>
	$(document).ready(function(){
		  $("button").click(function(){
				var un = document.getElementById("search").value;
				var loc = "<? echo $loc; ?>";
				 $.post("aggregate_search.php",
					{

					  keyword: un
					},
					function(data,status){
						//alert(data);
						document.getElementById('json').value = data;
						document.getElementById('srch').submit();
			    });
  });
});
</script>
	
	
	
	
	
	
	
	
	
  </head>

  <body background="newbackground.jpg" style="background-repeat: no-repeat">


  <form id="srch" method="post" action="results.php">
  <input type="hidden" id="json" name="json"/>
  </form>
  
	

      <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">YoYo</a>

          <div class="nav-collapse collapse pull-right">
              <ul class="nav">

                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                		Notifications 
                		<b class="caret"></b>
                	</a>
                	<ul class="dropdown-menu">
                		<li class="nav-header"> Messages </li>
                		<li class="nav-header"> Opportunities </li>
                		<li class="nav-header"> Shares </li>
                	</ul>
                </li>

                <?php if($user ==null){?>
                	<li><a href="login.html">Login</a></li>
                <? }else{ ?> 
                	<li><a href="myprofile.php">Profile</a></li>
                <? } ?>	
                <li class="active"><a href="signup.html">Sign-Up</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
  </div>
    <div class="container">
    	
	
		    <div style="margin-top:10%; margin-left:12%" class="input-append">
		        <input id="search" name="search" type="text" placeholder="What's your passion?" class="span8"/>
		        <button class="btn btn-primary">Discover</button>	
		    </div>
		
    	<div class="bannerbottom">
    		<center>
    		<p><a href="tandc.html">Terms and Conditions</a></p>
			<script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script>
			<script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
			<script type="IN/Share" data-counter="right"></script>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.yoyoambition.com">Tweet</a>
			</center>
    	</div> 
    	<!-- /container -->
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


    </script>
    
    <script>
(function ($, window, delay) {
  // http://jsfiddle.net/AndreasPizsa/NzvKC/
  var theTimer = 0;
  var theElement = null;
    var theLastPosition = {x:0,y:0};
  $('[data-toggle]')
    .closest('li')
    .on('mouseenter', function (inEvent) {
    if (theElement) theElement.removeClass('open');
    window.clearTimeout(theTimer);
    theElement = $(this);

    theTimer = window.setTimeout(function () {
      theElement.addClass('open');
    }, delay);
  })
    .on('mousemove', function (inEvent) {
        if(Math.abs(theLastPosition.x - inEvent.ScreenX) > 4 || 
           Math.abs(theLastPosition.y - inEvent.ScreenY) > 4)
        {
            theLastPosition.x = inEvent.ScreenX;
            theLastPosition.y = inEvent.ScreenY;
            return;
        }
        
    if (theElement.hasClass('open')) return;
    window.clearTimeout(theTimer);
    theTimer = window.setTimeout(function () {
      theElement.addClass('open');
    }, delay);
  })
    .on('mouseleave', function (inEvent) {
    window.clearTimeout(theTimer);
    theElement = $(this);
    theTimer = window.setTimeout(function () {
      theElement.removeClass('open');
    }, delay);
  });
})(jQuery, window, 200); // 200 is the delay in milliseconds
</script>

	<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		if(!d.getElementById(id)){js=d.createElement(s);
		js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}}
		(document, 'script', 'twitter-wjs');
	</script>
	
  </body>
</html>


