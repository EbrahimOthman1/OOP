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
      
     
        .legend{
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
                    <?php
                    include "action.php";
                    if (isset($_GET["update"])){
                        $id = $_GET["id"] ?? null;
                        $where = array (
                            "id"           => $id,
                            "title"        => $title,
                            "rate"         => $rate ,
                            "published_at" => $published_at ,
                            "author_name"  => $author_name,
                            "description"  => $description);
                       $ob = new DataOperation();
                       $row = $obj -> select_record("books",$where);

                       //header("location: index2.php");
                    }
                       ?>
                       
                    
                    <form  method="POST" enctype='multipart/form-data' >
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                          <div class="form-group">
                            <label>Rate</label>
                            <input type="number" name="rate" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Published_at</label>
                            <input type="date" name="published_at" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Book_path</label>
                            <input type="file" name="Book_path" class="form-control">
                        </div>                        
                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                         <br> 
                         <br>     
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>                
                        <input type="submit" class="btn btn-primary" value="update" name="update">
                        <a href="home.php" class="btn btn-primary">Cancel</a>
                    </fieldset>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

