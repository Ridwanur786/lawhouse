<?php
include __DIR__ . "/../vendor/autoload.php";
 $json = '../scripts/schema.json';
 $data = file_get_contents($json);
 $decode_json = json_encode($data,true);

 echo "<br>".$decode_json . "<br>";
 
?>