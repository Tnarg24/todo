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


        //Run the Select query 
        //printf("Reading data from table: \n");
        $res = mysqli_query($conn, 'SELECT * FROM tasks order by Id desc limit 1');
        while ($row = mysqli_fetch_assoc($res)) {
        //    var_dump($row); 

            echo "<a href='#' data-taskid='". $row["id"] . "' class='list-group-item list-group-item-action' >
                    ". $row["title"] . "
                    <br />
                    ". $row["description"] . "
                </a>";
        }

    }







?>



