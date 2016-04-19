<?php
ob_start();
include('page/config.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:login.php');
    exit();
}

$error_sms = '';

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];
    if ($old_pass != '') {
        //// validate with old password
        $md5old_pass = md5($old_pass);
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM user where userid = 1 AND password = '$md5old_pass'";
        $query = mysqli_query($con, $query);
        if ($query) {
            $num_row = mysqli_num_rows($query);

            if ($num_row > 0) {
                //add yo
                //   $error_sms .="<p style='color: red;'>Your old password does not match.</p>"; 
            } else {
                $error_sms .="<p style='color: red;'>Your old password does not match.</p>";
            }
        } else {
            $error_sms .="<p style='color: red;'>Error.</p>";
        }
    }

    if ($old_pass != '' && $error_sms == '') {
        $con_pass = $_POST['con_pass'];
        if ($new_pass == '') {
            $error_sms .="<p style='color: red;'>Please enter New password </p>";
        } else {
            if ($new_pass != $con_pass) {
                $error_sms .="<p style='color: red;'>New password and confirm password does not match.</p>";
            }
        }
    }

    if ($error_sms == '') {
        if ($old_pass == '') {
            $sql = "UPDATE user set username = '$username'";
        } else {
            $md5new_pass = md5($new_pass);
            $sql = "UPDATE user set username = '$username' , password = '$md5new_pass'";
        }
        $result = $con->query($sql);
        if ($result) {
            $error_sms .="<p style='color: red;'>Updated profile success.</p>";
        }
    }
}
?>

<?php
if (isset($_POST['save'])) {
    $company_name = $_POST['company_name'];
    
    if (!empty($_FILES['image']['name'])) {
        $uploaddir = 'img/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        $logo = $_FILES['image']['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
             $sql = "UPDATE config set logo = '$logo' , company_name = '$company_name'";
        }else {
            $sql = "UPDATE config set company_name = '$company_name'";
        }

        
      
    }else {
         $sql = "UPDATE config set company_name = '$company_name'";
    }
     $result = $con->query($sql);
        if ($result) {
            $error_sms .="<p style='color: red;'>Updated profile success.</p>";
        }else {
            $error_sms .="<p style='color: red;'>Error.</p>";
        }
} else {
   // $error_sms .= 'no img';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href='https://fonts.googleapis.com/css?family=Fasthand' rel='stylesheet' type='text/css'>
        <style type="text/css">
			 body {
                font-family: 'Fasthand', serif;
               
            }
            .login {
                width:540px;
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

        <?php
        $sql = "SELECT * FROM user";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $img = '';
            while ($row = $result->fetch_assoc()) {
                $username = $row['username'];
            }
            ?>
            <div class="login">
                <div class="container" style="text-align: right;">
                    
                    <a style="" href="remotes.php">ត្រលប់ក្រោយ</a>  &nbsp;&nbsp; | &nbsp;&nbsp; 
                    <a style="color: red;" href="profile.php?logout=true">ចាកចេញ</a> 
                   
                </div>
                <h4>ទិន្នន័យអ្នកប្រើប្រាស់</h4>
                <?php
                echo $error_sms;
                ?>
                <form method="post" action="" >
                    ឈ្មោះអ្នកប្រើ : 
                    <input class="form" type="text" required="" placeholder="Username" name="user" id="username" value="<?php echo $username ?>"> 
                    <br/><br/>លេខសម្ងាត់ចាស់
                    <input class="form" type="password"  name="old_pass"  id="password"> 
                    <br/><br/>លេខសម្ងាត់ថ្មី
                    <input class="form" type="password" name="new_pass"  id="password"> 
                    <br/><br/>វាយលេខសម្ងាត់ ម្ដងទៀត
                    <input class="form" type="password"  name="con_pass"  id="password"> 
                    <br/><br/>
                    <input type="submit" class="btn" name="submit" value="ផ្លាស់ប្តូរ">
                </form>

                <?php
            }
            ?>


            <h3>កំណត់</h3>
            <?php
            $query = "SELECT * FROM config where cid = 1";
            $query = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($query);
            ?>
            <form method="post" action=""  enctype="multipart/form-data">
               ឈ្មោះក្រុមហ៊ុន
                <input class="form-control" type="text"  name="company_name" value="<?php echo $row['company_name']; ?>"  id="password" required=""> 

                <br/><br/>
                <?php
                echo '<img src="img/' . $row['logo'] . '" style="width: 170px;" alt="Logo">';
                ?>
                <br/><br/>

                ស្លាកសញ្ញា : 
                <input  type="file" name="image" /> 
                <br/><br/>
                <input type="submit" class="btn" name="save" value="រក្សាទុក">
            </form>
        </div>
    </body>
</html>