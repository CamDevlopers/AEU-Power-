<?php
ob_start();
include('page/config.php');
session_start();
if (isset($_SESSION['login'])) {
    header('Location: remotes.php');
}else {

}

$error_sms = '';
if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $pass = md5($_POST['pass']);
    $query = "SELECT * FROM user where username = '$username' AND password = '$pass'";
    $query = mysqli_query($con, $query);
    if ($query) {
        $num_row = mysqli_num_rows($query);

        if ($num_row > 0) {
//add your code
            $row = mysqli_fetch_assoc($query);
            $_SESSION['login'] = 1;
            $_SESSION['user_id'] = $row['userid'];
            header('location:remotes.php');
        } else {
            $error_sms = '<p style="color: red;">Username and password does not correct. Please try again.</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link href='https://fonts.googleapis.com/css?family=Fasthand' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body { 
                background: url(img/background.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                padding-top: 80px;
                font-family: 'Fasthand', serif;
                font-size: 12px;

            }
            .login {
                width:270px;
                margin:auto;
                border:1px #CCC solid;
                padding:10px;
                background-color:#fff }
            input {
                border:1px #CCC solid;
                padding:10px;
                .btn {
                    background: #ccc;

                }
            }

        </style>


    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-panel panel panel-default">
                        <?php
                        $query = "SELECT * FROM config where cid = 1";
                        $query = mysqli_query($con, $query);
                        ?>
                        <div class="panel-body">
                            <h4 class="" style="text-align: center; font-weight: bold;">សូមស្វាគមន៍ កម្មវិធីបិទបើកភ្លើងតាមអុីុនធឺណែត <br/>
                                <?php
                                $row = mysqli_fetch_assoc($query);
                                echo '<strong style="color: #337AB7;"> ' . $row['company_name'] . '</strong>';
                                ?>

                            </h4>
                            <br/>
                            <div class="col-md-6">


                                <?php
                                echo $error_sms;
                                ?>
                                <form role="form" action="" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="ឈ្មោះអ្នកប្រើ" name="user" type="text" autofocus required="" value="">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" placeholder="លេខកូដសម្ងាត់" name="pass" type="password" value=""  required="">
                                        </div> 

                                        <!-- Change this to a button or input when using this as a form -->

                                        <input type="submit" class="btn btn-lg btn-success btn-block"  value="ចូល" name="submit"/>
                                    </fieldset>
                                    <br/>
                                </form>
                            </div>
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $("#hide").click(function () {
                                        $("#c_logo").hide();
                                        $("#change_logo").show();
                                    });
                                    $("#change_logo").click(function () {
                                        $("#c_logo").show();
                                        $("#change_logo").hide();

                                    });

                                });
                            </script>
                            <div class="col-md-6">
                                <div class="thumbnail" style="border: 0;">
                                    <?php
                                    echo '<img src="img/' . $row['logo'] . '" style="width: 170px;" alt="Logo">';
                                    ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>