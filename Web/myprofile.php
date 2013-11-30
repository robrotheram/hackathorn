<?php
	session_start();	
	$user = $_SESSION['userid'];
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
   <link href="reset.css" rel="stylesheet">
   <link href="./INC/bootstrap/css/bootstrap.css" rel="stylesheet">
   <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
   </style>
   <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
   <link href="yoyoambition.css" rel="stylesheet">
   <link href="login.css" rel="stylesheet">
   

   <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
   <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
   <![endif]-->

   <!-- Fav and touch icons -->
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
   <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
   <link rel="shortcut icon" href="../assets/ico/favicon.png">
   
   
   
   
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
var obj;
$(document).ready(function(){
	$.get( "getusertest.php", function( data ) {
  		obj = jQuery.parseJSON(data);		
		//alert(obj.message.username);
		var input = $('#fNameField');
    	input.val(obj.message.forename);
    	var input2 = $('#sNameField');
    	input2.val(obj.message.surname);
    	var input3 = $('#postcodeField');
    	input3.val(obj.message.location);
    	var input4 = $('#emailField');
    	input4.val(obj.message.username);
    	document.getElementById('dobField').value = obj.message.dob;
		
		if(obj.message.gender == 'male'){
			document.getElementById('maleRadio').checked = true;
		}else{
			document.getElementById('femaleRadio').checked = true;
		};
		
		
		
		
		
});
	});
</script>
   
   
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
         <div class="page-header">
                    <h2>My Profile</h2>
            </div>
   	
      <div id="profilepic">     
        <img src="images/av3.jpg" alt="profile pic" width="200" height="120" /> 
        <p><a href="#" class="btn btn-default" role="button" style="margin-left:16px">Change profile picture.</a></p> 
      </div>

      <div id="fNameInput" class="span5">       
            <label for="fNameField">First Name:</label>
            <input id="fNameField" name="forename" type="text"></input>
      </div>
      <div id="sNameInput" class="span5">           
            <label for="sNameField">Last Name:</label>
            <input id="sNameField" name="surname" type="text"></input>
      </div>

      <div id="emailInput" class="span5">
          <label for="emailField">Email Address:</label>
          <input id="emailField" name="email" type="email"></input><br />
      </div>
      <div id="addressInputs" class="span5">
        <label for="postcodeField">Post Code:</label>
        <input id="postcodeField" name="postcode" type="text"></input>  
      </div>
      <div id="dobInput" class="span5">
          <label for="dobField">Date of Birth:</label>        
          <input id="dobField" name="dob" type="date"></input>
        </div>

        <div id="genderInput" class="span5">          
          <input id="maleRadio" class="genderRadio" type="radio" name="gender" value="male">
            <label class="radioLabel" for="maleRadio">Male</label>          
          </input>
          <input id="femaleRadio" class="genderRadio" type="radio" name="gender" value="female">
            <label class="radioLabel" for="femaleRadio">Female</label>          
          </input>
        </div>
        
        <!--
        <div id="disiInput" class="span5">  
        <label for="disabilityInput">Do you have a disability?</label>         
          <input id="disableYes" class="disableRadio" type="radio" data-toggle="collapse" name="disability" value="yes">
            <label class="radioLabel" for="disableYes">Yes</label>          
          </input>
         
          <input id="disableNo" class="disableRadio" type="radio" name="disability" value="no">
            <label class="radioLabel" for="disableNo">No</label>          
          </input>
        </div>
      -->
        <div class="clear"></div> 
        <div id="supportWorkerInput" class="span12">  
        <label for="supportInput">Do you need a Support Worker?</label>         
          <input id="supportYes" class="supportRadio" type="radio" name="supportWorker" value="yes">
            <label class="radioLabel" for="supportYes">Yes</label>          
          </input>
          <input id="supportNo" class="supportRadio" type="radio" name="supportWorker" value="no">
            <label class="radioLabel" for="supportNo">No</label>          
          </input>
        </div>
       <div class="clear"></div> 
        <div id="disableInput" class="span12">
          <label for="disableInput">If you have a disability, please state what it is:</label>        
          <input style="width:70%;height:100px;"id="disableInput" name="disable" type="text"></input>
        </div>

        <div id="qualificationInput" class="span12">
          <label for="qualificationInput">Qualifications:</label>        
          <input style="width:70%;height:100px;"id="qualificationInput" name="qualifications" type="text"></input>
        </div>

         <div id="workexInput" class="span12">
          <label for="workexInput">Work Experience:</label>        
          <input style="width:70%;height:100px;"id="workexInput" name="workex" type="text"></input>
        </div>

        <div id="hobbiesInput" class="span12">
          <label for="hobbiesInput">Hobbies or Interests:</label>        
          <input style="width:70%;height:100px;"id="hobbiesInput" name="hobbies" type="text"></input>
        </div>

        <div id="aboutmeInput" class="span12">
          <label for="aboutmeInput">About Me:</label>        
          <input style="width:70%;height:100px;"id="aboutmeInput" name="about" type="text"></input>
        </div>

        <div id="submitInput" class="span12">
          <button>Submit</button>   
        </div>

    </div>
      
    
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
</body>
</html>