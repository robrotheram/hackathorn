<?php
	if(isset($_POST['email'])){	
		$email = $_POST['email'];
  			$message = $_POST['message'] ;
		mail("robrotheram@gmail.com", "contact form",
  		$message, "From:" . $_POST['name']);
  		header('Location: completedemail.html');
	}
	?>
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
                <li><a href="signup.html">Sign-Up</a></li>
                <li class="active"><a href="contact.php">Contact</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

    <div class="container">
    	<!-- /container -->
    	<div class="span12">
            <div class="page-header">
                    <h2>Send Us A Message</h2>
            </div>
            <p>Let us know what you think! Just give us a few details about yourself first.</p>
            <form method="post" action="contact.php">
                    <fieldset>
                        <div class="clearfix">
                            <label for="name"><span>Name:</span></label>
                            <div class="input">
                                <input tabindex="1" id="name" name="name" label="Name" type="text" value="">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="email"><span>Email:</span></label>
                            <div class="input">
                        	    <input tabindex="2" id="email" name="email" label="Email" type="text" value="">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="message"><span>Message:</span></label>
                            <div class="input">
                                <textarea tabindex="3" class="xxlarge" style="width:70%" id="comments" name="body" label="Message" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="actions"><a href="completedemail.html">
                            <input tabindex="4"  type="submit" id="submit" class="btn primary large" value="Send message">
                        </a></div>
                    </fieldset>
            </form>

            
    </div>
        <div class="bannerbottom">
    	    <center>
			<script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script>
			<script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
			<script type="IN/Share" data-counter="right"></script>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.yoyoambition.com">Tweet</a>
			</center>
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


 
