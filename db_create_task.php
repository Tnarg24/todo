<?php


$host = 'todoappdb.mysql.database.azure.com';
$username = 'standishg';
$password = 'Test1234?';
$db_name = 'appdatabase';
//Initializes MySQLi 
$conn = mysqli_init(); 
mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
// Establish the connection 
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL); 
//If connection failed, show the error 
if (mysqli_connect_errno()) {    
    die('Failed to connect to MySQL: '.mysqli_connect_error());
};



//print_r($conn);




// // Run the create table query 
// if (mysqli_query($conn, ' 
//     CREATE TABLE Products ( 
//         `Id` INT NOT NULL AUTO_INCREMENT , 
//         `ProductName` VARCHAR(200) NOT NULL , 
//         `Color` VARCHAR(50) NOT NULL , 
//         `Price` DOUBLE NOT NULL ,
//          PRIMARY KEY (`Id`) 
//     );
// ')) 

// //{ printf("Table created\n"); }


//Create an Insert prepared statement and run it 
$product_name = 'Grants Product';
$product_color = 'Pink';
$product_price = 15.5;
if ($stmt = mysqli_prepare($conn, "
    INSERT INTO Products (ProductName, Color, Price)
    VALUES (?, ?, ?)
")) {     
    mysqli_stmt_bind_param($stmt, 'ssd', $product_name, $product_color, $product_price);
    mysqli_stmt_execute($stmt);
    printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
    mysqli_stmt_close($stmt);
}


//Run the Select query 
printf("Reading data from table: \n");
$res = mysqli_query($conn, 'SELECT * FROM Products');
while ($row = mysqli_fetch_assoc($res)) {
//    var_dump($row); 

    echo "Product Name: " . $row["ProductName"];
    echo "<br /><br />";
    echo "Color: " . $row["Color"];
}








// $title = $_POST['title'];
// $description = $_POST['description'];

// $task = $title ." - ". $description;

// echo json_encode($task);