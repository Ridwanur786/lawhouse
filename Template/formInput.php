<?php
require_once "../vendor/autoload.php";
include "../lib/Database.php";
include "../config/config.php";
include "../helpers/Format.php";
$fm= new Format();
$db = new Database();
if ($_SERVER['REQUEST_METHOD']=='POST')
{
$name= mysqli_real_escape_string($db->link,$fm->validation($_POST['name']));
$email=mysqli_real_escape_string($db->link,$fm->validation($_POST['email']));
$mobile=mysqli_real_escape_string($db->link,$fm->validation($_POST['number']));
$message=mysqli_real_escape_string($db->link,$fm->validation($_POST['message']));
if (empty($name)||empty($email)||empty($mobile)||empty($message))
{
echo "<p class='alert alert-warning'><i class='fa fa-warning'></i> Field Must Not be Empty!!</p>";
exit();
// echo json_encode($error);
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    echo "<p class='alert alert-info'><i class='fa fa-info-circle'></i> Please enter a valid email address!!</p>";
    exit();
}else{
$formQuery = "INSERT INTO `tbl_contact`(name,email,number,message) VALUES('$name','$email','$mobile','$message')";
$inserted_row = $db->insert($formQuery);
if ($inserted_row) {
    echo "<p class='alert alert-success'><i class='fa fa-check-circle-o'></i> Your letter sent successfully!! </p>";
    exit();
} else {

    echo "<p class='alert alert-danger'><i class='fa fa-window-close-o'></i> Decline!!please Try again in a moment!!</p>";
    exit();
}
}
}
