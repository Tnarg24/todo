<?php

include "db_connection.php";


$res = mysqli_query($conn, 'DELETE FROM appdatabase.tasks WHERE Id > 11');






?>