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
                <center><h5>Add Pharmacist Page</h5></center>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
                    </div><br>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter Email ID">
                    </div><br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No.">
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="add_pharmacist">Add Pharmacist</button>
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
