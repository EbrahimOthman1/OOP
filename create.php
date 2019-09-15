<?php
Include "db.php";
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
       
        .wrapper{
            width: 500px;
            font-size: 15px;
            margin: 0 auto;
            border-radius: 12px;
        }
        .box{
            background: #563af;
            padding: 10px;
            width: 230px;
            height: 40px;
            border:solid;
            font-size: 15px;
        }
      
     
      legend{
        text-align: center;
        padding-bottom: 10px;
        font-weight: bold;
        font-style: italic;
      }
    </style>
</head>
<body >
    <div class="wrapper ss">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                    </div>
                    <form action="action.php" method="POST" enctype='multipart/form-data'>
                          <fieldset>
                              <legend>ADD BOOK</legend>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                         <!-- input rate -->
                          <div class="form-group">
                            <label>Rate</label>
                            <input type="number" name="rate" class="form-control">
                        </div>
                        <!-- input published_at  -->
                         <div class="form-group">
                            <label>Published_at</label>
                            <input type="date" name="published_at" class="form-control" value="<?php echo ($published_at) ?>">
                        </div>
                        <!-- input image_path -->
                         <div class="form-group">
                            <label>Book_path</label>
                            <input type="file" name="book_image" class="form-control">
                        </div>
                
                        
                        <!-- input description -->
                        
                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                            <select class = "box" name="author_name">
                                    

                                    <option value="" disabled selected> Select Author Name </option>
                                    ?>
                                    <?php
                                    $res =mysqli_query($db,"SELECT name FROM authors");
                                    while($row =mysqli_fetch_array($res))
                                    {
                                      ?>
                                      <option>
                                        <?php echo $row["name"]; ?>
                                      </option>
                                      <?php
                                    }
                                    ?>
                            </select>
                         <br> 
                         <br>                     
                        <input type="submit" class="btn btn-primary" value="Insert" name="submit">
                        <a href="home.php" class="btn btn-primary">Cancel</a>
                    </fieldset>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
