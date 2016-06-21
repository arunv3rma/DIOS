<?php 

	// Adding Database config file
	require_once("mentorheader.php");
	require_once("config.php");
	
	//Start Session
	@session_start();
?>


    <title>Mentee Profile</title>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mentee Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php
             // Get user basic from user table
	$mentor = $_SESSION['username'];
	$mentee = $_POST['mentee'];
	$emails = $mentee."|".$mentor;

	// Action for accept mentee
	if ($_POST['action'] == 'Accept') {
		
		$str = "UPDATE mentor_request SET status = 1 WHERE emails='".$emails."'";
		
		// echo $str;
		$res=mysqli_query($connection,$str);
		if($res)
		{
		    // echo "Success";
		    // header("location:mentorhome.php");  
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="mentorhome.php";
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
			   window.location="mentorhome.php";
			//-->
			</script>
		    <?php 
		}
	} 
	
	// Reject mentee
	else if ($_POST['action'] == 'Reject') {
	    
	    $str = "UPDATE mentor_request SET status = 2 WHERE emails='".$emails."'";
		
		// echo $str;
		$res=mysqli_query($connection,$str);
		if($res)
		{
		    // echo "Success";
		    // header("location:mentorhome.php");
		    ?>
		    <script type="text/javascript">
			<!--
			   window.location="mentorhome.php";
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
			   window.location="mentorhome.php";
			//-->
			</script>
		    <?php 
		}
	}

	else {

		// Get user basic from user table
		$sql="select name, gender from users where email='".$mentee."'";
		$res=mysqli_query($connection,$sql);

		//echo $sql;
		// Check for user existance
		if(mysqli_num_rows($res) > 0) {
		
			// Display user data
			$row=mysqli_fetch_row($res);
			echo "Mantee Name ".$row[0];
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

		// Get mentee data from user table
		$sql="select mobile, keyword, linkedin from menteeinfo where email='".$mentee."'";
		$res=mysqli_query($connection,$sql);

		//echo $sql;
		// Check for user existance
		if(mysqli_num_rows($res) > 0) {
		
			// Display mantee data
			$row=mysqli_fetch_row($res);
			echo "<br/>Mobile: ".$row[0];
			$key = $row[1];
			echo "<br/>Mentee Linkedin link: ".$row[2];
			mysqli_free_result($res);
		}
		?>
		<br/>
		<button onclick="location.href = 'mentorhome.php';" id="login">Back to Home</button>
		<?php

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
