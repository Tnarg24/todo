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
$res = mysqli_query($conn, 'SELECT * FROM tasks');

// The mysqli_fetch_assoc() function fetches a result row as an associative array. This now loops through and prints the title and description for each item in the array. The data-taskid pulls the Id from the DB and adds here (not seen from front end (useful for deleting individual records))
while ($row = mysqli_fetch_assoc($res)) {
    echo "<a href='#' data-taskid='". $row["Id"] . "' data-tasktitle='". $row["title"] ."' data-taskdescription='". $row["description"] . "' class='list-group-item list-group-item-action task-item'  >
            ". $row["title"] . "
            <br />
            ". $row["description"] . "
        </a>"; 
}





?>