<?php


    include "db_connection.php";

    //On save button clicked > ajax script passes the _data object values to this page > connects to the db and inserts into the tasks table > generates the HTML structure for each task and then passes that back to the calling AJAX script (in the result variable)


    if (isset($_POST["title"]) && isset($_POST["description"])){ /*isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.This function returns true if the variable exists and is not NULL, otherwise it returns false - so this gets the values from the title and description from the post request and runs function if true */
        // Create an Insert prepared statement and run it 
        
        // The prepare() / mysqli_prepare() function is used to prepare an SQL statement for execution. mysqli_prepare(connection, query)
        if ($stmt = mysqli_prepare($conn, " 
            INSERT INTO tasks (title, description)
            VALUES (?, ?)
        ")) {  /* $stmt = mysqli_prepare() is a prepared statement it's a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency. Prepared statements basically work like this:            
            Prepare: An SQL statement template is created and sent to the database. Certain values are left unspecified, called parameters (labeled "?"). Example: INSERT INTO MyGuests VALUES(?, ?, ?)
            The database parses, compiles, and performs query optimization on the SQL statement template, and stores the result without executing it
            Execute: At a later time, the application binds the values to the parameters, and the database executes the statement. The application may execute the statement as many times as it wants with different values */   
            mysqli_stmt_bind_param($stmt, 'ss', $_POST['title'], $_POST['description']);// Get the table from $ssmt, 'ss' = 2 string values, $_POST['title'], $_POST['description' give the values to be added to the table
            mysqli_stmt_execute($stmt); // execute the statement
            mysqli_stmt_close($stmt);// returns a boolean value which is true on success and false on failure
        }


        // This appends the values to the list

        $res = mysqli_query($conn, 'SELECT * FROM tasks order by Id desc limit 1'); // Get the newest row from the table
        while ($row = mysqli_fetch_assoc($res)) { // get value of $res as an array and print to page

            echo "<a href='#' data-taskid='". $row["Id"] . "' class='list-group-item list-group-item-action' >
                    ". $row["title"] . "
                    <br />
                    ". $row["description"] . "
                </a>";
        }

    }







?>



