<?php

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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling.css" type="text/css">  
    <title>MyFirstToDoApp</title>

</head>

<body>

    <div class="container">
           
        <h1>To Do</h1>

    <?php

        //Run the Select query 
        //printf("Reading data from table: \n");
        $res = mysqli_query($conn, 'SELECT * FROM tasks');
        while ($row = mysqli_fetch_assoc($res)) {
        //    var_dump($row); 

            // echo "Product Name: " . $row["ProductName"];
            // echo "<br /><br />";
            // echo "Color: " . $row["Color"];

            echo "<div style='padding: 5px 0px 5px 0px'>
                ". $row["title"] . "
                <div style='padding-top: 2px'>". $row["description"] . "</div>
                </div>
            ";
        }

    ?>



       

        <a  href="create_task.html" class="btn btn-primary btn-md">Create New</a>

        

    </div>
