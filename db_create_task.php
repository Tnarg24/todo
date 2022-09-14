<?php
try{

$host = 'todoappdb.mysql.database.azure.com';
$username = 'standishg';
$password = 'Test1234?';
$db_name = 'appdatabase';
//Initializes MySQLi 
$conn = mysqli_init(); 
mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
// Establish the connection 
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL); 
//If connection failed, show the error 
if (mysqli_connect_errno()) {    
    die('Failed to connect to MySQL: '.mysqli_connect_error());
};

// print_r($conn);


    if (isset($_POST["title"]) && isset($_POST["description"])){

        // Create an Insert prepared statement and run it 
        
        
        $res =  if ($stmt = mysqli_prepare($conn, "
            INSERT INTO tasks (title, description)
            VALUES (?, ?)
        ")) {     
            mysqli_stmt_bind_param($stmt, 'ssd', $_POST['title'], $_POST['description']);
            mysqli_stmt_execute($stmt);
            // printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
            mysqli_stmt_close($stmt);
        }

        // $title = $_POST['title'];
        // $description = $_POST['description'];

        // $task = $title ." - ". $description;

        echo json_encode($res);

    }
}
catch(Exception $e){
    echo " <br /><br /> error: " . $e->getMessage();
} 






?>



