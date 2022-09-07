<?php

// function OpenCon(){
//     $dbhost = "localhost";
//     $dbuser = "root";
//     $dbpass = "1234";
//     $db = "example";
//     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

//     return $conn;
// }
 
// function CloseCon($conn){
//     $conn -> close();
// }


$title = $_POST['title'];
$description = $_POST['description'];

$task = $title ." - ". $description;

echo json_encode($task);