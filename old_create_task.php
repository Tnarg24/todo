<?php


    include "db_connection.php";

// print_r($conn);


    if (isset($_POST["title"]) && isset($_POST["description"])){
        // Create an Insert prepared statement and run it 
        
        
        if ($stmt = mysqli_prepare($conn, "
            INSERT INTO tasks (title, description)
            VALUES (?, ?)
        ")) {     
            mysqli_stmt_bind_param($stmt, 'ss', $_POST['title'], $_POST['description']);
            mysqli_stmt_execute($stmt);
            // printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
            mysqli_stmt_close($stmt);
        }

        // $title = $_POST['title'];
        // $description = $_POST['description'];

        // $task = $title ." - ". $description;

        // echo json_encode(array("status"=>"success"));

        $stmt = $conn->prepare('SELECT * from tasks limit 1 order by id desc');
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
      
            echo "<a href='#' data-taskid='". $data["id"] . "' class='list-group-item list-group-item-action' >
                    ". $data["title"] . "
                    <br />
                    ". $data["description"] . "
                </a>";
    }

    







?>



