<?php
    include_once "loginheader.php";
    $flag=@$_GET['flag'];
?>


<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php
                                if($flag==9) {
                                    echo "<font color='Green'>Succefully Sign Up, You can Sign In now</font>";
                                }
                                elseif ($flag==1) {
                                    echo "<font color='Red'>Invalid LDAP Username and Password!!!</font>";
                                }
                                else {
                                    echo "Enter LDAP Username and Password";
                                }
                            ?>
                         </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="LDAP Username" name="ldap_id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button href="index.html" class="btn btn-primary btn-lg btn-block">Login</button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../public/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../public/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../public/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../public/js/sb-admin-2.js"></script>

</body>

</html>
