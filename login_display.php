<?php

include "db_connection.php";

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
           
        <h1>Login details</h1>

        <a  href="login.html" class="btn btn-primary btn-md">Back</a>

    <?php

        //Run the Select query 
        //printf("Reading data from table: \n");
        $res1 = mysqli_query($conn, 'SELECT * FROM login_page');
        while ($row1 = mysqli_fetch_assoc($res1)) {
        //    var_dump($row1); 

            echo "<div style='padding: 5px 0px 5px 0px'>
                ". $row1["email"] . "
                <div style='padding-top: 2px'>". $row1["password"] . "</div>
                </div>
            ";
        }

    ?>



       

        

        

    </div>
