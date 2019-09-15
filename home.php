 <head>
    <?php include"nav.html"; ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
       <style type="text/css">
        .wrapper{
            width: 640px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
      
        table tr td:last-child a{
            margin-right: 15px;
        }
        .button-1{
            position: relative;
            top: 80px;
            left: -500;
        }
        .button-2{
            position: relative;
            top: 40px;
            left: -250px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                         <a href="create.php" class="btn btn-success pull-right button-1">Add New Book</a>
                        <br>
                        <br>
                        <a href="users.php" class="btn btn-success pull-right button-2">List Of Users</a>
                        <br>
                        <br>
                     <a href="author.php" class="btn btn-success pull-right">List Of Authors</a>
                    </div>
                    <?php
                    include "action.php";
                    $ob = new DataOperation();
                    $myrow = $obj -> fetch_record("books");
                    
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Title</th>";
                                        echo "<th>Action</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($myrow as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                       <?php
                                        echo "<td>";
                                            echo "<a href='view.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                    ?>
                                <?php } ?>

                                 </tbody>                            
                            </table> 

                </div>
            </div>        
        </div>
    </div>
</body>
</html>