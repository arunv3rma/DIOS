<?php
    // Adding Database config file
    include_once "header.php";
    require_once("config.php");
    
    //Start Session
    @session_start();
?>


    <title>Mentee Home</title>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mentee Home</h1>
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
    $sql="select mobile, linkedin, industry, category, utype from menteeprofile where email='".$_SESSION['username']."'";
    $res=mysqli_query($connection,$sql);

    //echo $sql;
    // Check for user existance
    if(mysqli_num_rows($res) > 0) {
    
        // Display mantee data
        $row=mysqli_fetch_row($res);
        echo "<br/>Your Mobile: ".$row[0];
        echo "<br/>Your Linkedin link: ".$row[1];
        $i = $row[2];
        echo "<br/>Searching mentor:<br/>Industry- ".$i;
        $c = $row[3];
        echo "<br/>Category- ".$c;
        $u = $row[4];
        echo "<br/>User Type- ".$u;-

        mysqli_free_result($res);
    }


    // Send Mentor request to mentor
    $sql="select email from mentorprofile where industry like '%".$i."%' OR category like '%".$c."%' OR utype like '%".$u."%'";
    $res=mysqli_query($connection,$sql);


    // echo $sql;
    // Check for user existance
    if(mysqli_num_rows($res) > 0) {
    
        // Display mantee data
        $mentor_emails = [];
        while($row=mysqli_fetch_row($res)) {
            //echo "<br/>".$row[0]; 
            //array_push($mentor_emails, $row[0]);
            $mssql="select status, mentor from mentor_request where mentor_email='".$row[0]."'";
            $msres=mysqli_query($connection,$mssql);
            if(mysqli_num_rows($msres) > 0) {
                $msrow=mysqli_fetch_row($msres);
                $status = $msrow[0];
                
                if($msrow[1]==1) {
                    $status = 5;
                }

                $add = array($row[0] => $status);
                $mentor_emails = array_merge($mentor_emails, $add);
            }
            else {
                $add = array($row[0] => 3);
                $mentor_emails = array_merge($mentor_emails, $add);
            }
            // unset($mentor_emails[$row[0]);
            // print_r($mentor_emails);
            // echo "<br/>Status of ".$row[0]." is ".$status;
        }

        // print list of mentor who are mentoring mentee
        // Details of mentors
        $count = count($mentor_emails);
        $c=0;
        echo "<br/><br/> These people who are mentoring you: ";
        foreach($mentor_emails as $email => $status) {
            if($status == 5) {
                $msql="select name from users where email='".$email."'";
                $mres=mysqli_query($connection,$msql);
                $mrow=mysqli_fetch_row($mres);
                echo "<br/> Name: ".$mrow[0];
                ?>
                <form action='mentorreq.php' method='post'>
                <input type='text' value='<?php echo $email;?>' name = 'mentor' hidden/>
                <input type="submit" name="action" value="View Profile" />          
                <input type="submit" name="action" value="Delete Request" />
                </form>
                <?php
                $c = 1;
            }
        }
        if($c == 0) {
            echo "<br/> You do not have any mentor";
        }
        else {
            $c = 0;
        }

        echo "<br/><br/> These people have accept your request:";
        foreach($mentor_emails as $email => $status) {
            if($status == 1) {
                $msql="select name from users where email='".$email."'";
                $mres=mysqli_query($connection,$msql);
                $mrow=mysqli_fetch_row($mres);
                echo "<br/> Name: ".$mrow[0];
                ?>
                <form action='mentorreq.php' method='post'>
                <input type='text' value='<?php echo $email;?>' name = 'mentor' hidden/>
                <input type="submit" name="action" value="View Profile" />              
                <input type="submit" name="action" value="Delete Request" />
                <input type="submit" name="action" value="Pay" />
                </form>
                <?php
                $c = 1;
            }
        }
        if($c == 0) {
            echo "<br/> You do not have any mentor";
        }
        else {
            $c = 0;
        }

        echo "<br/><br/> You have requested these people for mentorship:";
        foreach($mentor_emails as $email => $status) {
            if($status == 0) {
                $msql="select name from users where email='".$email."'";
                $mres=mysqli_query($connection,$msql);
                $mrow=mysqli_fetch_row($mres);
                echo "<br/> Name: ".$mrow[0];
                ?>
                <form action='mentorreq.php' method='post'>
                <input type='text' value='<?php echo $email;?>' name = 'mentor' hidden/>
                <input type="submit" name="action" value="View Profile" />          
                <input type="submit" name="action" value="Delete Request" />
                </form>
                <?php
                $c = 1;
            }
        }
        if($c == 0) {
            echo "<br/> You do not have any mentor";
        }
        else {
            $c = 0;
        }


        echo "<br/></br>These people can mentor you: ";
        foreach($mentor_emails as $email => $status) {
            if($status == 3) {
                $msql="select name, gender from users where email='".$email."'";
                $mres=mysqli_query($connection,$msql);
                $mrow=mysqli_fetch_row($mres);
                if($gen == $mrow[1]) {
                    echo "<br/> Name: ".$mrow[0];
                    ?>
                    <form action='mentorreq.php' method='post'>
                    <input type='text' value='<?php echo $email;?>' name = 'mentor' hidden/>
                    <input type="submit" name="action" value="View Profile" />
                    <input type="submit" name="action" value="Send Request" />
                    </form>
                    <?php
                    $c = 1;
                }
            }
        }
        if($c == 0) {
            echo "<br/> You do not have any mentor";
        }
        else {
            $c = 0;
        }

        echo "<br/><br/>These people have rejected your request: ";
        foreach($mentor_emails as $email => $status) {
            if($status == 2) {
                $msql="select name from users where email='".$email."'";
                $mres=mysqli_query($connection,$msql);
                $mrow=mysqli_fetch_row($mres);
                echo "<br/> Name: ".$mrow[0];
                ?>
                <form action='mentorreq.php' method='post'>
                <input type='text' value='<?php echo $email;?>' name = 'mentor' hidden/>
                <input type="submit" name="action" value="View Profile" />
                <input type="submit" name="action" value="Delete Request" />
                </form>
                <?php
                $c = 1;
            }
        }
        if($c == 0) {
            echo "<br/> You do not have any mentor";
        }
        else {
            $c = 0;
        }


        
        mysqli_free_result($res);
    }

    else {
        echo "Mentor is not available in your field now";
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
