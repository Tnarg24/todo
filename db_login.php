<?php


    include "db_connection.php";

// print_r($conn);


    if (isset($_POST["email"]) && isset($_POST["password"])){
        // Create an Insert prepared statement and run it 
        
        
        if ($stmt = mysqli_prepare($conn, "
            INSERT INTO login_page (email, password)
            VALUES (?, ?)
        ")) {     
            mysqli_stmt_bind_param($stmt, 'ss', $_POST['email'], $_POST['password']);
            mysqli_stmt_execute($stmt);
            // printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
            mysqli_stmt_close($stmt);
        }

        // $email = $_POST['email'];
        // $password = $_POST['password'];

        // $task = $email ." - ". $password;

        echo json_encode(array("status"=>"success"));

    }







?>



