<?php
    session_start();
    if(isset($_SESSION['fname'])){
        include('includes/connection.php');
    if(isset($_POST['update_salesman'])){
        $query = "update salesmans set fname = '$_POST[fname]',lname = '$_POST[lname]',email = '$_POST[email]',mobile = $_POST[mobile] where id = $_SESSION[uid]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Salesman updated successfully...');
            window.location.href = 'dashboard.php';
        </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error..!! Plz try again');
            window.location.href = 'dashboard.php';
        </script>";
        }
    }
    $query = "select * from salesmans where id = $_GET[uid];";
    $query_run = mysqli_query($connection,$query);
    $id = "";
    $fname = "";
    $lname = "";
    $email = "";
    $mobile = "";
    if(mysqli_num_rows($query_run)){
        while($row = mysqli_fetch_assoc($query_run)){
            $_SESSION['uid'] = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
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
                <center><h5>Edit Salesman Page</h5></center>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>"">
                    </div><br>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" value="<?php echo $mobile;?>">
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="update_salesman">Update</button>
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
    