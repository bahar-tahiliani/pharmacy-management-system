<?php
    session_start();
    if(isset($_SESSION['fname'])){
    include('includes/connection.php');
    $query = "select * from managers;";
    $query_run = mysqli_query($connection,$query);
?>
<html>
    <head>
        <!-- CSS File -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- jQuery files -->
        <script src="jquery/jQuery.min.js"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-4 m-auto"><br><br>
                <center><h5>List of all Managers</h5></center>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>FName</th>
                            <th>LName</th>
                            <th>Email Id</th>
                            <th>Mobile</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                        <?php 
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($query_run)){
                                $sno += 1;
                                ?>
                                <tr>
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['fname'];?></td>
                                <td><?php echo $row['lname'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['mobile'];?></td>
                                <td><?php echo $row['role'];?></td>
                                <td><a href="editManager.php?uid=<?php echo $row['id'];?>" target="_blank"><i class="fa fa-edit"></i></a> | <a href="deleteManager.php?uid=<?php echo $row['id'];?>"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>
<?php
    }
    else{
        header('location:index.php');
    }
?>
    