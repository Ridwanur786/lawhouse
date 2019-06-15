<?php
include __DIR__.'/../../lib/Session.php';
require_once __DIR__."/../../vendor/autoload.php";
include __DIR__."/../../lib/Database.php";
include __DIR__."/../../config/config.php";
//include __DIR__."/../../helpers/Format.php";
$db = new Database();

if(!isset($_GET['deleteid'])|| isset($_GET['deleteid'])==NULL)
{
    echo"<script>window.location='index.php';</script>";
}else
{
    $delId = $_GET['deleteid'];
    $delQuery = "SELECT * FROM `tbl_page` WHERE `id`='$delId'";
    $deletedId = $db->select($delQuery);

    $delQuery = "DELETE  FROM `tbl_page` WHERE `id`='$delId'";
    $deletedData = $db->delete($delQuery);
    if($deletedData)
    {
        echo "<script>alert('page Deleted Successfully!!');</script>";
        echo "<script>window.location = 'index.php';</script>";
    }else
    {
        echo "<script>alert('page  not Deleted !!');</script>";
        echo "<script>window.location = 'index.php';</script>";
    }
}
