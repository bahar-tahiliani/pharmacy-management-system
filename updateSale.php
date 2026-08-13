<?php
    session_start();
    if(isset($_SESSION['fname'])){
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
                <center><h5>Update today's sale</h5></center>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="total_sale" placeholder="Today's total sale ?">
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="update_sale">Update</button>
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
