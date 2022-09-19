<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
  <h2 style="margin-bottom: 80px;">ToDo</h2>

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

</body>
</html>


   

          





        
        
        



    
        

        

    </div>



        
