<?php
    include_once "signupheader.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#mentee" data-toggle="tab"><b>Mentee</b></a>
                            </li>
                            <li><a href="#mentor" data-toggle="tab"><b>Mentor</b></a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs">
                                <li class="active"><a href="#mentee" data-toggle="tab"><b>Mentee Sign Up</b></a>
                                </li>
                                <li><a href="#mentor" data-toggle="tab"><b>Mentor Sign Up</b></a>
                                </li>
                            </ul> -->

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="mentee">
                                    <form role="form" action="newuser.php" method="post">
                                        <fieldset>
                                            <!-- <div class="form-group">
                                                <input type="radio" name="type" value="0"><font style="font-size:20px;">&nbsp;&nbsp;Mentee</font>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="type" value="1"><font style="font-size:20px;">&nbsp;&nbsp;Mentor</font>
                                            </div> -->
                                            <!-- <br/> -->
                                            <input type="text" name="type" value="0" hidden>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Mentee Name" name="name" type="text" autofocus>
                                            </div>                                
                                            <div class="form-group">
                                                <input class="form-control" placeholder="E-mail" name="email" type="email">
                                            </div>                                
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Password" name="password" type="password">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Repeat Password" name="rpassword" type="password">
                                            </div>
                                            <div class="form-group">
                                                <font style="font-size:17px;">Date of Birth </font>
                                                    <select name="day">
                                                       <option>Day</option>
                                                        <?php

                                                            for($i=1;$i<32;$i++)
                                                            {
                                                                echo "<option>".$i."</option>";
                                                            } 
                                                        ?>
                                                    </select>
                                                    <select name="month">
                                                        <option>Month</option>
                                                        <?php

                                                            for($i=1;$i<13;$i++)
                                                            {
                                                                echo "<option>".$i."</option>";
                                                            } 
                                                        ?>
                                                        </select>                                    
                                                    <select name="year">
                                                        <option>Year</option>
                                                        <?php
                                                            for($i=2015;$i>1930;$i--)
                                                            {
                                                                echo "<option>".$i."</option>";
                                                            } 
                                                        ?>
                                                    </select> 
                                                    </div>
                                            <div class="form-group">
                                                <input type="radio" name="gender" value="0"><font style="font-size:16px;">&nbsp;&nbsp;Male</font>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="gender" value="1"><font style="font-size:16px;">&nbsp;&nbsp;Female</font>
                                            </div>
                                            
                                            <!-- <div class="checkbox">
                                                <label>
                                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                </label>
                                            </div> -->
                                            <!-- Change this to a button or input when using this as a form -->
                                            <button href="index.html" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                            
                                        </fieldset>
                                    </form>    
                                </div>
                                <div class="tab-pane fade" id="mentor">
                                    <form role="form" action="newuser.php" method="post">
                                        <fieldset>
                                            <!-- <div class="form-group">
                                                <input type="radio" name="type" value="0"><font style="font-size:20px;">&nbsp;&nbsp;Mentee</font>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="type" value="1"><font style="font-size:20px;">&nbsp;&nbsp;Mentor</font>
                                            </div> -->
                                            <!-- <br/> -->
                                            <input type="text" name="type" value="1" hidden>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Mentor Name" name="name" type="text" autofocus>
                                            </div>                                
                                            <div class="form-group">
                                                <input class="form-control" placeholder="E-mail" name="email" type="email">
                                            </div>                                
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Password" name="password" type="password">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Repeat Password" name="rpassword" type="password">
                                            </div>
                                            <div class="form-group">
                                                <font style="font-size:17px;">Date of Birth </font>
                                                    <select name="day">
                                                       <option>Day</option>
                                                        <?php

                                                            for($i=1;$i<32;$i++)
                                                            {
                                                                echo "<option>".$i."</option>";
                                                            } 
                                                        ?>
                                                    </select>
                                                    <select name="month">
                                                        <option>Month</option>
                                                        <?php

                                                            for($i=1;$i<13;$i++)
                                                            {
                                                                echo "<option>".$i."</option>";
                                                            } 
                                                        ?>
                                                        </select>                                    
                                                    <select name="year">
                                                        <option>Year</option>
                                                        <?php
                                                            for($i=2015;$i>1930;$i--)
                                                            {
                                                                echo "<option>".$i."</option>";
                                                            } 
                                                        ?>
                                                    </select> 
                                                    </div>
                                            <div class="form-group">
                                                <input type="radio" name="gender" value="0"><font style="font-size:16px;">&nbsp;&nbsp;Male</font>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="gender" value="1"><font style="font-size:16px;">&nbsp;&nbsp;Female</font>
                                            </div>
                                            
                                            <!-- <div class="checkbox">
                                                <label>
                                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                </label>
                                            </div> -->
                                            <!-- Change this to a button or input when using this as a form -->
                                            <button href="index.html" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                            
                                        </fieldset>
                                    </form>      
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>    <!-- /.panel -->
                
            </div>
        </div>
    </div>

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
