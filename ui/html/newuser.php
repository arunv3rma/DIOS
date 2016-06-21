<?php
	require_once("config.php");
	$flag=0;
	$type = $_POST['type'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$dob = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
	
$str = <<<insert
	INSERT INTO users(name,email,password,type,gender,dob) VALUES (
	'$name','$email','$password',$type,$gender,'$dob')
insert;
	
	// echo $str;
	$res=mysqli_query($connection,$str);
	if($res)
	{
	    $flag=9;  
	    //echo "Success";
	    header("location:signin.php?flag=$flag");  
	}
	else
	{
		$flag=9;  
	    //echo "Success";
	    // header("location:signup.php?flag=$flag");  
	}
	
?>