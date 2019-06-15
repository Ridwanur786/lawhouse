<?php
include __DIR__.'/../../lib/Session.php';
require_once __DIR__."/../../vendor/autoload.php";
include __DIR__."/../../lib/Database.php";
include __DIR__."/../../config/config.php";
//include __DIR__."/../../helpers/Format.php";
$db = new Database();

if(!isset($_GET['deletepostid'])|| $_GET['deletepostid']==NULL)
{
    echo"<script>window.location='postlist.php';</script>";
}else
{
    $delId = $_GET['deletepostid'];
    $delQuery = "SELECT * FROM `tbl_post` WHERE `id`='$delId'";
    $deletedId = $db->select($delQuery);

    if ($deletedId)
    {
        while($delImage = $deletedId->fetch_assoc())
        {
            $deletedLink = $delImage['img'];
            unlink($deletedLink);
        }
    }

    $delQuery = "DELETE  FROM `tbl_post` WHERE `id`='$delId'";
    $deletedData = $db->delete($delQuery);
    if($deletedData)
    {
        echo "<script>alert('Data Deleted Successfully!!');</script>";
        echo "<script>window.location = 'postlist.php';</script>";
    }else
        {
            echo "<script>alert('Data  not Deleted !!');</script>";
            echo "<script>window.location = 'postlist.php';</script>";
    }
}
