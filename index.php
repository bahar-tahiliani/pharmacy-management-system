<?php
    session_start();
    if(isset($_POST['login'])){
    include('includes/connection.php');
    if($_POST['role'] == 'admin')
        $query = "select * from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
    elseif($_POST['role'] == 'manager')
        $query = "select * from managers where email = '$_POST[email]' AND password = '$_POST[password]'";
    elseif($_POST['role'] == 'pharmacist')
        $query = "select * from pharmacists where email = '$_POST[email]' AND password = '$_POST[password]'";
    else
        $query = "select * from salesmans where email = '$_POST[email]' AND password = '$_POST[password]'";
  	$query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
			$_SESSION['role'] = $_POST['role'];
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['uid'] = $row['id'];
			}
      echo "<script type='text/javascript'>
      	window.location.href = 'dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
      	alert('Please enter correct credentials.');
      	window.location.href = 'index.php';
      </script>";
    }
  }
?>
<html>
    <head>
        <title>Login Page</title>
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
    <body id="login_page">
        <div class="row">
            <div class="col-md-4 m-auto" id="form_content"><br>
                <h3><center>Login Page</center></h3>
                <form action="" method="post">
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    </div><br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div><br>
                    <select name="role" class="form-control">
                        <option>-Select role-</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="pharmacist">Pharmacist</option>
                        <option value="salesman">Salesman</option>
                    </select><br>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </body>
</html>