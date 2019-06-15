<?php
include __DIR__ ."/../../lib/Session.php";
require_once __DIR__ ."/../../vendor/autoload.php";
//Session::checkSession();
Session::checkLogin();
include __DIR__ ."/../../lib/Database.php";
include __DIR__ ."/../../config/config.php";
include __DIR__ ."/../../helpers/Format.php";
$fm= new Format();
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            $userName = $fm->validation($_POST['username']);
            $passWord = $fm->validation(md5($_POST['password']));
            $name = mysqli_real_escape_string($db->link,$userName);
            $pass= mysqli_real_escape_string($db->link,$passWord );
            $query = " SELECT * FROM `tbl_user` WHERE `username`='".$name."' AND `password`='".$pass."'";
           // var_dump($query);

            $result = $db->select($query);
            //var_dump($result);
            if ($result!== false)
            {
                $value = $result->fetch_assoc();
                //var_dump($value);
                        Session::set("login",true);
                        Session::set("username",$value["username"]);
                        Session::set("userId",$value["id"]);
                        Session::set("userRole",$value["role"]);
                        //header("Location:index.php");
                        echo "<script> location.replace('index.php'); </script>";
            }else
            {
                echo "data not Matched!!";
            }
        }
        ?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username">
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password">
			</div>
			<div>
				<input type="submit" value="Login">
			</div>
		</form><!-- form -->
        <div class="button">
            <a href="recoverPass.php">Forgot password!!</a>
        </div><!-- button -->
		<div class="button">
			<a href="#">LAW HOUSE</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>