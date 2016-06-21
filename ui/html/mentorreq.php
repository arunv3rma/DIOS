<?php
	// Adding Database config file
    require_once('header.php');
	require_once("config.php");
	
	//Start Session
	@session_start();
?>


    <title>Mentor Profile</title>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mentor Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php
             // Get user basic from user table
	$mentee = $_SESSION['username'];
	$mentor = $_POST['mentor'];
	$emails = $mentee."|".$mentor;

	// Action for view mentor profile
	if ($_POST['action'] == 'View Profile') {
		
		// Get user basic from user table
		$sql="select name, gender from users where email='".$mentor."'";
		$res=mysqli_query($connection,$sql);

		//echo $sql;
		// Check for user existance
		if(mysqli_num_rows($res) > 0) {
		
			// Display user data
			$row=mysqli_fetch_row($res);
			echo "Mantor Name ".$row[0];
			//echo "<br/>User Basic Data:";
			$gen = $row[1];
			if($row[1]==0) {
				$gender = 'Male';
			}
			else {
				$gender = 'Female';
			}
			echo "<br/>Gender: ".$gender;
			mysqli_free_result($res);
		}

		// Get mentor data from user table
		$sql="select mobile, keyword, linkedin from mentorinfo where email='".$mentor."'";
		$res=mysqli_query($connection,$sql);

		//echo $sql;
		// Check for user existance
		if(mysqli_num_rows($res) > 0) {
		
			// Display mantee data
			$row=mysqli_fetch_row($res);
			echo "<br/>Mobile: ".$row[0];
			$key = $row[1];
			echo "<br/>Mentor Linkedin link: ".$row[2];
			mysqli_free_result($res);
		}
		?>
		<br/>
		<button onclick="location.href = 'menteehome.php';" id="login">Back to Home</button>
		<?php
	} 
	
	// Pay for mentor mentee
	else if ($_POST['action'] == 'Pay') {
	    echo "Payment gateway is going to add soon";
		$str = "UPDATE mentor_request SET mentor = 1 WHERE emails='".$emails."'";
	
		// echo $str;
		$res=mysqli_query($connection,$str);
		if($res)
		{
		    // echo "Success";
		  	// header("location:menteehome.php");
		  	?>
		    <script type="text/javascript">
			<!--
			   window.location="menteehome.php";
			//-->
			</script>
		    <?php   
		}
		else
		{
			// echo "fail";
		    //header("location:newuser.php?flag=$flag"); 
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="menteehome.php";
			//-->
			</script>
		    <?php 
		}
	}

	// Send Request 
	else if ($_POST['action'] == 'Send Request') {
	    
	    $str = "INSERT INTO mentor_request(email,mentor_email,emails) VALUES ('$mentee','$mentor','$emails')";
	
		// echo $str;
		$res=mysqli_query($connection,$str);
		if($res)
		{
		    // echo "Success";
		    // header("location:menteehome.php");  
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="menteehome.php";
			//-->
			</script>
		    <?php
		}
		else
		{
			//echo "fail";
			// header("location:menteehome.php");  
		    //header("location:newuser.php?flag=$flag"); 
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="menteehome.php";
			//-->
			</script>
		    <?php
		}
	}

	// Delete Request
	else if ($_POST['action'] == 'Delete Request') {
	    
	    $str = "Delete from mentor_request where emails ='".$emails."'";
	
		// echo $str;
		$res=mysqli_query($connection,$str);
		if($res)
		{
		    // echo "Success";
		    // header("location:menteehome.php"); 
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="menteehome.php";
			//-->
			</script>
		    <?php 
		}
		else
		{
			// echo "fail";
		    //header("location:newuser.php?flag=$flag"); 
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="menteehome.php";
			//-->
			</script>
		    <?php 
		}
	}
?>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
