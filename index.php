<?php

include "db_connection.php"; // includes connection to DB

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap library - used for CSS. Use bootstrap website to search styling of lists, forms buttons etc and copy/paste -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  
    <!-- Jquery used to select elements and perform action. Basic syntax is: $(selector).action() -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <title>MyFirstToDoApp</title>
</head>

<body>

    <div class="container"> 
        <div class="card" style="width: 100%; margin-top: 30px"> <!-- bootstrap card with all content inside -->
            <div class="card-body" >
                <h5 class="card-title">Tasks</h5>
                <h6 class="card-subtitle mb-2 text-muted">Add your tasks here</h6>
                <div id="task_list">
                    <div class="list-group" id="task_card">

                    </div>  
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_task_modal">
                    Create New Task <!-- Opens modal using bootstrap -->
                    </button>
                </div>
            </div>
        </div>

        

        <!-- Modal Content (bootstrap) -->
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
                        <button type="button" class="btn btn-primary" id="save_button" data-bs-dismiss="modal">Save changes</button>
                        <button type="button" class="btn btn-primary" id="delete_button" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
            
            
    </div> 

    <script>

        // This function appends title and description onto the page when the save button is clicked 
        // function appendtask(taskarg){ 
        //     $('#task_card').append(taskarg) //select task_card and append taskarg (result of ajax below)
        // }

        // save to db
        $(document).on('click', '#save_button', function(e){ // select document > on click > of save button  > run this function 
            e.preventDefault(); // cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur - the default behaviour of a button in a form is to submit - this prevents that from happening. 
            
            var _data = { //Variable that holds an object - when the user adds a task and description > clicks save - the values are added to the title and desription object key
                    title :  $('#task_title').val(),
                    description :  $('#task_description').val() 
                }

            // jQuery AJAX request - exchanges data with a server, and update parts of a web page - without reloading the whole page.
            $.ajax({
                url: `db_create_task.php`, //specify the URL to send the request to
                type: 'POST', //type of http request e.g. POST, PUT and GET. Default is GET.
                data: _data, // Passes in the data from the object above
                success: function(result){ // On success - run the append task function and pass in result as taskarg
                    loadtasklist()

                    // appendtask(result);
                    // clears form and closes modal
                    $('#survey-form')[0].reset()
                }
            });
        })

        $(document).on('click', '.task-item', function(){
           var title = $(this).data('tasktitle')
           var description = $(this).data('taskdescription')
           $('#create_task_modal').modal('show')
           $('#task_title').val(title)
           $('#task_description').val(description)
            
        }) 

        // creates a text string in standard URL-encoded notation
        var form = $('#survey-form').serialize()
            console.log(form)


        function loadtasklist(){
            $.ajax({
                url: `/Tasks/index.php`, //specify the URL to send the request to
                type: 'GET', //type of http request e.g. POST, PUT and GET. Default is GET.
                success: function(result){ 
                    $('#task_card').html(result)
                }
            });
        }

        $(document).ready(function(){
           loadtasklist()
        })

        // Delete

        $(document).on('click', '#delete_button', function(e){ // select document > on click > of save button  > run this function 
            e.preventDefault(); // cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur - the default behaviour of a button in a form is to submit - this prevents that from happening. 
            
            $.ajax({
                url: `/Tasks/delete.php`, //specify the URL to send the request to
                type: 'DELETE', //type of http request e.g. POST, PUT and GET. Default is GET.
                success: function(result){ 
                    $('#task_card').html(result)
                }
            });

            
        })

            
    </script>

</body>
</html>




        
