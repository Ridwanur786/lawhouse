<?php
require_once '../vendor/autoload.php';
include "../lib/Database.php";
include "../config/config.php";
include "../helpers/Format.php";

$db =new Database();
$fm = new Format();
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = mysqli_real_escape_string($db->link,$fm->validation($_POST['sender']));
    $postComment = mysqli_real_escape_string($db->link,$fm->validation($_POST['comment']));
    $commentId = mysqli_real_escape_string($db->link,$fm->validation($_POST['commentId']));
   // $commentDate = mysqli_real_escape_string($db->link,$fm->validation($fm->DateFormat($_POST['date'])));

    if (!empty($name) && !empty($postComment)) {
        
            $commentQuery = "INSERT INTO `comment`(parent_id,comment,sender) VALUES('".$commentId."','".$postComment."','".$name."')";
            $commentsResult = $db->insert($commentQuery);
            if ($commentsResult) {
                $msg = "<p class='alert alert-success'><span class='fa-layers fa-fw'><i class='fas fa-check-circle fa-2x'></i></span>success</p>";
                $status = array
                (
                    'error' => 0,
                    'message' => $msg
                );
            } else {
                $msg = "<p class='alert alert-danger'><i class='fas fa-times-circle fa-2x'></i>deny</p>";
                $status = array
                (
                    'error' => 1,
                    'message' => $msg
                );

            }
        } else {
            $msg = "<p class='alert alert-warning'><i class='fas fa-bell fa-2x'></i>empty field</p>";
            $status = array
            (
                'error' => 2,
                'message' => $msg
            );

        }
        echo json_encode($status);
   
}
