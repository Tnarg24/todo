<?php

include "db_connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>MyFirstToDoApp</title>

</head>

<body>


   


    <div class="container">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Tasks</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <div id="task_list">

                    <div class="list-group">
                        
                        <?php

                            //Run the Select query 
                            //printf("Reading data from table: \n");
                            $res = mysqli_query($conn, 'SELECT * FROM tasks');
                            while ($row = mysqli_fetch_assoc($res)) {
                            //    var_dump($row); 

                                echo "<a href='#' class='list-group-item list-group-item-action' >
                                        ". $row["title"] . "
                                        <br />
                                        ". $row["description"] . "
                                    </a>";
                            }

                        ?>
                      
    
                    </div>
                   
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_task_modal">
                    Create New Task
                    </button>
                </div>
            </div>
        </div>



        
            <!-- Trigger the modal with a button -->
        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="create_task_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="survey-form">
                            <div class="mb-3">
                                <label for="task_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="task_title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="task_description" class="form-label">Description</label>
                                <textarea class="form-control" id="task_description" rows="3" name="description"></textarea>
                            </div>                                              
                        </form> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
            
            
    </div> 

    <script>

        // save to db
        $(document).on('click', '#save_button', function(e){
            e.preventDefault();      
            
            var form = $('#survey-form').serialize()
            console.log(form)

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




        
