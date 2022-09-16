<?php

include "db_connection.php";

//Run the Select query 
//printf("Reading data from table: \n");
$res = mysqli_query($conn, 'SELECT * FROM tasks');
while ($row = mysqli_fetch_assoc($res)) {
//    var_dump($row); 

    echo "Product Name: " . $row["title"];
    echo "<br /><br />";
    echo "Color: " . $row["description"];
}

// //Run the Select query 
// //printf("Reading data from table: \n");
// $res = mysqli_query($conn, 'SELECT * FROM login_page');
// while ($row = mysqli_fetch_assoc($res)) {
// //    var_dump($row); 

//     echo "Product Name: " . $row["email"];
//     echo "<br /><br />";
//     echo "Color: " . $row["password"];
// }




?>