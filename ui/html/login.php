<?php
	
	// Adding Database config file
	require_once("config.php");
	$flag=0;

	//Start Session
	session_start();

	// Get user login details
	$email = $_POST['email'];
	$password = $_POST['password'];
	$_SESSION['username']= $email;
	
	// Run Table query
	$sql="select active, type from users where email='".$email."' AND password='".$password."'";
	$res=mysqli_query($connection,$sql);

	//echo $sql;
	// Check for user existance
	if(mysqli_num_rows($res) > 0) {

		//CHECK FOR ACTIVE ACCOUNT
			// Todo function
		
		// Checking for user account
		$row=mysqli_fetch_row($res);

		//O for mentee else mentor
		if($row[1]==0) {
	 	   header("location:mentee.php");
		}
		else {
			header("location:mentor.php");
		}
	}

	else {
		$flag=1;
		// User not exist
	   	header("location:signin.php?flag=$flag");
	}
?>