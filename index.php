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
    <style></style><style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }
    </style>
    <title>MyFirstToDoApp</title>

</head>

<body>

    <div class="container">
           
        <h1>To Do</h1>

    <?php

        //Run the Select query 
        //printf("Reading data from table: \n");
        $res = mysqli_query($conn, 'SELECT * FROM tasks');
        while ($row = mysqli_fetch_assoc($res)) {
        //    var_dump($row); 

            // echo "Product Name: " . $row["ProductName"];
            // echo "<br /><br />";
            // echo "Color: " . $row["Color"];

            echo "<div style='padding: 5px 0px 5px 0px'>
                ". $row["title"] . "
                <div style='padding-top: 2px'>". $row["description"] . "</div>
                </div>
            ";
        }

    ?>



       

        <a  href="create_task.html" class="btn btn-primary btn-md">Create New</a>

        <a  href="login.html" class="btn btn-primary btn-md">Login</a>






            <!-- Trigger/Open The Modal -->
            <button id="myBtn">Create New</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                

                    <header class="header">
                        <h1 id="title">
                            Create Task
                        </h1>
                        <p id="description">
                            Describe your task here
                        </p>
                    </header>
                    
                    <form id="survey-form">
                
                        <div class="form-group"> 
                            <label for="task_title">Title</label>
                            <input class="form-controlgs" type="text" id="task_title" required>
                        </div>    
                        
                        
                        <div class="form-group">
                            <label for="task_description">Task description</label>
                            <textarea class="input-textarea" id="task_description" name="comment" rows="3" ></textarea>
                        </div>
                
                        <div><!--button-->
                            <button style="margin-bottom: 15px;" class="submit-button" id="save_button" data-cool="12345">Save</button>
                                                       
                        </div>

                    


                
                    </form>      



            </div>

            </div>

            <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // save to db

            $(document).on('click', '#save_button', function(e){
                e.preventDefault();      
                
                $.ajax({
                    url: `db_create_task.php`, 
                    type: 'POST', //Request object
                    data: {
                        title :  $('#task_title').val(),
                        description :  $('#task_description').val() 
                    },
                    success: function(result){
                        console.log(result)
                    }
                });
            })

            
            </script>

</body>
</html>



        
        
        



    
        

        

    </div>



        
