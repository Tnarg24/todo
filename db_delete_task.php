<?php


    include "db_connection.php";


    $sql = "DELETE FROM tasks WHERE Id=3";
if(mysqli_query($link, $sql)){
    echo "Record was deleted successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($link);
}
mysqli_close($link);







?>
