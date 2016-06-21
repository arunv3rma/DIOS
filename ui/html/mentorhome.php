<?php
    include_once "mentorheader.php";
    require_once("config.php");
    @session_start();

?>

    <title>Mentor Home</title>
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
	$sql="select name, gender from users where email='".$_SESSION['username']."'";
	$res=mysqli_query($connection,$sql);

	//echo $sql;
	// Check for user existance
	if(mysqli_num_rows($res) > 0) {
	
		// Display user data
		$row=mysqli_fetch_row($res);
		echo "Welcome ".$row[0];
		echo "<br/>User Basic Data:";
		// $gen = $row[1];
		// if($row[1]==0) {
		// 	$gender = 'Male';
		// }
		// else {
		// 	$gender = 'Female';
		// }
		// echo "<br/>Gender: ".$gender;
		mysqli_free_result($res);
	}

	// Get mentee data from user table
	$sql="select mobile, keyword, linkedin from mentorinfo where email='".$_SESSION['username']."'";
	$res=mysqli_query($connection,$sql);

	//echo $sql;
	// Check for user existance
	if(mysqli_num_rows($res) > 0) {
	
		// Display mantee data
		$row=mysqli_fetch_row($res);
		echo "<br/>Mobile: ".$row[0];
		$key = $row[1];
		echo "<br/>Mentoring for: ".$key;
		echo "<br/>Your Linkedin link: ".$row[2];
		mysqli_free_result($res);
	}


	// Send Mentor request to mentor
	echo "<br/><br/> These people request you for mentoring:";
	$sql="select email, status from mentor_request where mentor_email='".$_SESSION['username']."'";
	$res=mysqli_query($connection,$sql);
	$menres = $res;
	// echo $sql;
	// Check for user existance
	if(mysqli_num_rows($res) > 0) {
	
		// Display mantee data
		while($row=mysqli_fetch_row($res)) {
			//echo "<br/>".$row[0]; 
			if($row[1]==0) {
				$msql="select name from users where email='".$row[0]."'";
				$mres=mysqli_query($connection,$msql);
				$mrow=mysqli_fetch_row($mres);
				echo "<br/> Name: ".$mrow[0];
				?>
				<form action='mentorres.php' method='post'>
					<input type='text' value='<?php echo $row[0];?>' name = 'mentee' hidden/>
					<input type="submit" name="action" value="View Profile" />
					<input type="submit" name="action" value="Accept" />
					<input type="submit" name="action" value="Reject" />
				</form>
				<?php
			}
			else {
				echo "<br/> No new mentee request<br/>";
			}
		}
		mysqli_free_result($res);
	}

	else {
		echo "<br/>No mentee is requested for your mentoring";
	}

	// Mentoring 
	echo "<br/> You are mentoring:";
	$sql="select email, status from mentor_request where mentor_email='".$_SESSION['username']."'";
	$res=mysqli_query($connection,$sql);
	$menres = $res;
	// echo $sql;
	// Check for user existance
	if(mysqli_num_rows($res) > 0) {
	
		// Display mantee data
		while($row=mysqli_fetch_row($res)) {
			//echo "<br/>".$row[0]; 
			if($row[1]==1) {
				$msql="select name from users where email='".$row[0]."'";
				$mres=mysqli_query($connection,$msql);
				$mrow=mysqli_fetch_row($mres);
				echo "<br/> Name: ".$mrow[0];
				?>
				<form action='mentorres.php' method='post'>
					<input type='text' value='<?php echo $row[0];?>' name = 'mentee' hidden/>
					<input type="submit" name="action" value="View Profile" />
				</form>
				<?php
			}
			else {
				echo "<br/> Not mentoring anyone";
			}
		}
		mysqli_free_result($res);
	}

	else {
		echo "<br/>No mentee is requested for your mentoring";
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
