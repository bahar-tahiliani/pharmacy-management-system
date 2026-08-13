<?php
    session_start();
    if(isset($_SESSION['fname'])){
        include('includes/connection.php');
        $query = "select * from medicines;";
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
            <div class="col-md-4 m-auto"><br>
                <center><h5>Update Item in stok</h5></center><br>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Name of Medicine:</label>
                        <select name="name" class="form-control">
                            <option>-Select name of medicine-</option>
                            <?php 
                                while($row = mysqli_fetch_assoc($query_run)){
                                    ?>
                                    <option><?php echo $row['name'];?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>No. of Item Sold:</label>
                        <input type="text" class="form-control" name="qty" placeholder="No. of Quantity sold"><br>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
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
