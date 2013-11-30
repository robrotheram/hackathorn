<?php
	//User registrations here
	
	/*This will use basic Create, Read, Update, Delete (CRUD) commands
	* to connect to an online sql database (stored on my website)
	*
	* The code will create a new row
	* All details are read from HTTP Post Request
	*/
	
	// array for JSON response
	$response = array();
	$db = null;
	 
	// check for required fields
	if (isset($_POST['uname']) && isset($_POST['pass'])) {
	 
		$uname = $_POST['uname'];
		$password = $_POST['pass'];
	 
		// include db connect class
		include('connect.php');
	 
		$con=mysqli_connect($dbhost,$dbuname,$dbpass,$dbname);
		
		$sql = "INSERT INTO LoginDetails(username , password) VALUES('$uname', '$password');";
	 
		if (mysqli_query($con, $sql) == TRUE) {
			printf("User successfully logged in.\n");
			
			// successfully inserted into database
			$response["success"] = 1;
			$response["message"] = "User successfully inserted.";
		 
				// echoing JSON response
			echo json_encode($response);
		} else {
			// failed to insert row
			$response["success"] = 0;
			$response["message"] = "An error occurred. Entry not inserted.";
		 
			// echoing JSON response
			echo json_encode($response);
		}
	} else {
		// required field is missing
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";
	 
		// echoing JSON response
		echo json_encode($response);
	}

	$db = null;
?>