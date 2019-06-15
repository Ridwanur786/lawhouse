<?php
include __DIR__.'/../../../lib/Session.php';
Session::checkSession();
//Session::checkLogin();
require_once __DIR__."/../../../vendor/autoload.php";
include __DIR__."/../../../lib/Database.php";
include __DIR__."/../../../config/config.php";
include __DIR__."/../../../helpers/Format.php";
$fm= new Format();
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
<?php  include __DIR__.'/../adminScripts/css.php';?>
<?php  include __DIR__.'/../adminScripts/js.php';?>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatleft logo">
                <img src="../../images/lawhouse_1.png" alt="Logo" />
            </div>
            <div class="floatleft middle">
                <h1>LAW HOUSE</h1>
                <p>www.lawhousectg.com</p>
            </div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                <div class="floatleft marginleft10">
                    <?php
                    if(isset($_GET['action']) && ($_GET['action'] == 'logout'))
                    {
                        Session::destroySession();
                        echo "<script>location.replace('login.php');</script>";
                    }
                    ?>
                    <ul class="inline-ul floatleft">
                        <li>Hello <?php echo Session::get('username');?> </li>
                        <li><a href="?action=logout">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">
        <ul class="nav main">
            <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
            <li class="ic-dashboard"><a href="theme.php"><span>Theme</span></a> </li>
            <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
            <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
            <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
                <?php
                $contactQuery = "SELECT * FROM `tbl_contact` WHERE `status`='0' ORDER BY `id` DESC ";
                $contact = $db->select($contactQuery);
                if ($contact)
                {
                    $count = mysqli_num_rows($contact);
                    echo "(".$count.")";
                }else
                {
                    echo "(0)";
                }
                ?>
                        </span>
                </a></li>
            <?php
             if (Session::get('userRole')=='0')
             {
                 ?>
            <li class="ic-charts"><a href="AddUser.php"><span>Add User</span></a></li>
                 <?php
             }
            ?>
            <li class="ic-charts"><a href="userlist.php"><span>User List</span></a></li>
        </ul>
    </div>
    <div class="clear">
    </div>