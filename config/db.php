<?php
include 'config.php';
try
{
    $host=$config['DB_HOST'];
    $dbname=$config['DB_DATABASE'];
$conn= new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);
//new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
}
catch(PDOException $e)
{
    echo "Error:".$e->getMessage();
}
?>