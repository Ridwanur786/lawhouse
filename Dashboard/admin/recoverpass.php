<?php
include ("../../lib/Session.php");
//Session::checkSession();
Session::checkLogin();
require_once ("../../vendor/autoload.php");
include ("../../lib/Database.php");
include ("../../config/config.php");
include ("../../helpers/Format.php");
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
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $email = $fm->validation($_POST['email']);
            $pass = mysqli_real_escape_string($db->link, $email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<span>email invalid!! please put a valid email address</span>";
            } else {
                $mailQuery = "SELECT * FROM `tbl_user` WHERE `email`= '$email' LIMIT 1";
                $mailCheck = $db->select($mailQuery);
                if ($mailCheck != false) {
                    while ($value = $mailCheck->fetch_assoc()) {
                        $userId = $value['id'];
                        $userName = $value['username'];
                    }
                    $text = substr($email,0,5);
                    $rand = rand(10000,99999);
                    $newPass = "$text$rand";
                    $password = md5($newPass);
                    $query = "UPDATE `tbl_user` SET `password`='$password' WHERE `id`='$userId'";
                    $update= $db->update($query);
                    $to = "$email";
                    $from = "";
                    $headers = "From: $from" . "\r\n";
                    // Always set content-type when sending HTML email
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $subject = "";
                    $txt ="
                        <html>
                        <head>
                        <title>New Password</title>
                        </head>
                        <body>
                        <p>Your Password has Recovered!</p>
                        <table>
                        <tr>
                        <th>User Name</th>
                        <th>New Password</th>
                        </tr>
                        <tr>
                        <td> $userName </td>
                        <td>$newPass</td>
                        </tr>
                        </table>
                        <h4>Please Visit website for login</h4>
                        </body>
                        </html>
                        ";
                    $sendMail = mail($to,$subject,$txt,$headers);
                    if ($sendMail)
                    {
                        echo "<span class='success'>Recovery password send to your assigned email address!! Please check your email</span>";
                    }else
                    {
                        echo "<span class='error'>Failed to send email for password recovery!!</span>";
                    }
                }
        else
            {
                echo "Email Address not exist in our database!!";
            }
        }}
        ?>
        <form action="" method="post">
            <h1>Recover Password</h1>
            <div>
                <input type="text" placeholder="Enter  your email address" required="" name="email"/>
            </div>

            <div>
                <input type="submit" value="SEND" />
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="login.php">Log in</a>
        </div><!-- button -->
        <div class="button">
            <a href="#">LAW HOUSE</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>