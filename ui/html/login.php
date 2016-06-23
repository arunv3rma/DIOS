<?php

	// Adding Database config file
	require_once("config.php");
	$flag=0;

	//Start Session
	session_start();

	// Get user login details
  $ldap_id = $_POST['ldap_id'];
	$password = $_POST['password'];
	$_SESSION['ldap_id']= $ldap_id;


	// LDAP login authentication
	function ldap_auth($ldap_id, $ldap_password){
	    $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	    if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	    if($ldap_password=='') die("You have not entered any password. Please go back and fill it up.");
	    $sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	    $info = ldap_get_entries($ds, $sr);
	    $roll = $info[0]["employeenumber"][0];

	    //print_r($info);
	    $ldap_id = $info[0]['dn'];
	    if(@ldap_bind($ds,$ldap_id,$ldap_password)){
	        return $roll."|".$ldap_id;
	    }
	    else{
	        return "NONE";
	    }
	}

	ldapDetails = ldap_auth($_POST['user'], $_POST['pass']);
	// Run Table query
	$sql="select ldap_id, account_type from ieor_userinfo where ldap_id='".$ldap_id."' OR uid='".$ldap_id."'";
	$res=mysqli_query($connection,$sql);
	//
	echo $sql;
	// // Check for user existance
	if(mysqli_num_rows($res) > 0) {

		//CHECK FOR ACTIVE ACCOUNT
			// Todo function


		// Checking for user account
		$row=mysqli_fetch_row($res);
		echo $row[1];

	// 	// //rs for Research Scholar
	// 	// if($row[1]=='rs') {
	//  	//    header("location:rs.php");
	// 	// }
	// 	// else {
	// 	// 	header("location:others.php");
	// 	// }
	}

	else {
		// User not exist
		$flag=1;
	  header("location:signin.php?flag=$flag");
	}
?>
