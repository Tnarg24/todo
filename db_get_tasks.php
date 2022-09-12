<?php

include("db_connection.php");

//Run the Select query 
//printf("Reading data from table: \n");
$res = mysqli_query($conn, 'SELECT * FROM Products');
while ($row = mysqli_fetch_assoc($res)) {
//    var_dump($row); 

    echo "Product Name: " . $row["ProductName"];
    echo "<br /><br />";
    echo "Color: " . $row["Color"];
}






?>