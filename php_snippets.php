<?php


include "db_connection.php";

// Run the create table query 
if (mysqli_query($conn, ' 
    CREATE TABLE tasks ( 
        `Id` INT NOT NULL AUTO_INCREMENT , 
        `title` VARCHAR(100) NOT NULL , 
        `description` VARCHAR(200) NOT NULL , 
         PRIMARY KEY (`Id`) 
    );
')) 

if (mysqli_query($conn, ' 
    CREATE TABLE login_page ( 
        `Id` INT NOT NULL AUTO_INCREMENT , 
        `email` VARCHAR(100) NOT NULL , 
        `password` VARCHAR(200) NOT NULL , 
         PRIMARY KEY (`Id`) 
    );
')) 

//{ printf("Table created\n"); }

///////////////////////////////////////////////////////////////////////////////////////////////////////////

// object = {
//     this: 'shit',
//     that: 'fuck'
// }

// array = [this, that, thing]

// $row = array("this"=>"shit", "that"=>"fuck");

// $row["this"] //= shit



//////////////////////////////////////////////////////////////////////////////////////////////////////////////





?>