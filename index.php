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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styling.css" type="text/css"> 
    
    <title>MyFirstToDoApp</title>

</head>

<body>


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



    <div class="container">
        <h2 style="margin-bottom: 80px;">ToDo</h2>
            <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create New</button>
        <a  href="login.html" class="btn btn-info btn-lg">Login</a>

            <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->                
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Task</h4>
                    </div>
                    <div class="modal-body">                    
                                
                        <form id="survey-form">
                    
                            <div class="form-group"> 
                                <label for="task_title">Title</label>
                                <input class="form-controlgs" type="text" id="task_title" required>
                            </div>    
                            
                            
                            <div class="form-group">
                                <label for="task_description">Task description</label>
                                <textarea class="input-textarea" id="task_description" name="comment" rows="3" ></textarea>
                            </div>
                            
                        </form> 

                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default" id="save_button">Save</button>
                    </div>
                
                </div>
                
            </div>
        </div>
            
    </div> 

    <script>

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




        
