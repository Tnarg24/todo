<?php

$host = 'todoappdb.mysql.database.azure.com';
$username = 'standishg';
$password = 'Test1234?';
$db_name = 'appdatabase';
//Initializes MySQLi 
$conn = mysqli_init(); 
mysqli_ssl_set($conn,NULL,NULL, "../DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
// Establish the connection 
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL); 
//If connection failed, show the error 
if (mysqli_connect_errno()) {    
    die('Failed to connect to MySQL: '.mysqli_connect_error());
};



// $res variable connects to the database and returns the tasks table
$res = mysqli_query($conn, 'delete FROM tasks where Id > 1');







?>