<?php
    session_start();
    if(isset($_SESSION['fname'])){
    include('includes/connection.php');
    if($_SESSION['role'] == "admin"){
        $query = "select * from admins where id = $_SESSION[uid];"; 
    }
    elseif($_SESSION['role'] == "managers"){
        $query = "select * from managers where id = $_SESSION[uid];";
    }
    elseif($_SESSION['role'] == "pharmacist"){
        $query = "select * from pharmacists where id = $_SESSION[uid];";
    }
    else{
        $query = "select * from salesmans where id = $_SESSION[uid];";
    }
    $query_run = mysqli_query($connection,$query);
    $old_password = "";
    if(mysqli_num_rows($query_run)){
        while($row = mysqli_fetch_assoc($query_run)){
            $old_password = $row['password'];
        }
    }
    else{
        echo "<script type='text/javascript'>
            alert('No data found !!!');
            window.location.href = 'dashboard.php';
        </script>";
    }
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
                <center><h5>Change password</h5></center>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="password" class="form-control" name="old_password" placeholder="Enter Old Password">
                    </div><br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="update_password">Update</button>
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