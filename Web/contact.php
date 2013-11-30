<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>YoYo | Ambition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
          <a class="brand" href="index.html">YoYo</a>
          <div class="nav-collapse collapse pull-right">
            <ul class="nav" id="titlemenu">
              <li><a href="#about">Login</a></li>
              <li class="active"><a href="contact.php">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    	<!-- /container -->
    	<div class="span12">
            <div class="page-header">
                    <h2>Send us a message</h2>
            </div>
            <p>Let us know what you think! Just give us a few details about yourself first.</p>
            <form method="post" action="">
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
                        <div class="actions">
                            <input tabindex="4" href="completedmail.html" type="submit" id="submit" class="btn primary large" value="Send message">
                        </div>
                    </fieldset>
            </form>

            <?php
				if ($_POST['submit'])
				{
				  if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['comments']))
				    { 
				      $error = true;
				    
				    } else{

				      $to = "leysh01@gmail.com";

				      $name = trim($_POST['name']);
				      $number = trim($_POST['number']);
				      $email = trim($_POST['email']);
				      $comments = trim($_POST['comments']);

				      $subject = "Contact Form";

				      $messages = "Name: $name \r\n Email: $email \r\n Comments: $comments";
				      $headers = "From:" . $name;
				      $mailsent = mail($to, $subject, $messages, $headers);

				      if($mailsent){
				        $sent = true;
				        }
				  }

				}
			?>
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

  </body>
</html>


 
