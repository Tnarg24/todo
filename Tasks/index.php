<?php

include "db_connection.php";



// $res variable connects to the database and returns the tasks table
$res = mysqli_query($conn, 'SELECT * FROM tasks');

// The mysqli_fetch_assoc() function fetches a result row as an associative array. This now loops through and prints the title and description for each item in the array. The data-taskid pulls the Id from the DB and adds here (not seen from front end (useful for deleting individual records))
while ($row = mysqli_fetch_assoc($res)) {
    echo "<a href='#' data-taskid='". $row["Id"] . "' data-tasktitle='". $row["title"] ."' data-taskdescription='". $row["description"] . "' class='list-group-item list-group-item-action task-item'  >
            ". $row["title"] . "
            <br />
            ". $row["description"] . "
        </a>"; // Why have we done this in an anchor?
}





?>