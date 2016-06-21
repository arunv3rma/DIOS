<?php
	require_once("config.php");
	$flag=0;
	session_start();
	$email = $_SESSION['username'];
	$mobile = $_POST['mobile'];	
	$linkedin = $_POST['linkedin'];
	$education = $_POST['education'];
	$work = $_POST['work'];	
	$status = $_POST['status'];
	$project = $_POST['project'];	
	$industry = $_POST['industry'];
	$category = $_POST['category'];
	$utype = $_POST['utype'];
	$interest = $_POST['interest'];
	$mkind = "";
	$checked_count = count($_POST['mkind']);
	$count = 1;
	foreach ($_POST['mkind'] as $mk) {
    	if($count < $checked_count) {
    		$mkind .= $mk."|";
    	}
    	else {
    		$mkind .= $mk;
    	}
    	$count++;
 	}
 	$cost = $_POST['cost'];
	$days = $_POST['days'];
		
$str = <<<insert
	INSERT INTO mentorprofile(email,mobile,linkedin,education,work,cstatus,project,industry,category,utype,interest,mtype,cost,days) VALUES (
	'$email','$mobile','$linkedin','$education','$work','$status','$project','$industry','$category','$utype','$interest','$mkind','$cost','$days')
insert;
	
	// echo $str;
	$res=mysqli_query($connection,$str);
	if($res)
	{
	    //echo "Success";
	    header("location:mentorhome.php");  
	}
	else
	{
		echo "fail";
	    //header("location:newuser.php?flag=$flag"); 
	}
	
?>