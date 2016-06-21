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
	$industry = $_POST['industry'];
	$category = $_POST['category'];
	$utype = $_POST['utype'];
	$interest = $_POST['interest'];
	$project = $_POST['project'];
		
$str = <<<insert
	INSERT INTO menteeprofile(email,mobile,linkedin,education,work,cstatus,industry,category,utype,interest,project) VALUES (
	'$email','$mobile','$linkedin','$education','$work','$status','$industry','$category','$utype','$interest','$project')
insert;
	
	//echo $str;
	$res=mysqli_query($connection,$str);
	if($res)
	{
	    //echo "Success";
	    header("location:menteehome.php");  
	}
	else
	{
		echo "fail";
	    //header("location:newuser.php?flag=$flag"); 
	}
	
?>