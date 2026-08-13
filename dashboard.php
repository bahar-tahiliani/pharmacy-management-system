<?php
    session_start();
    if(isset($_SESSION['fname'])){
        include('includes/connection.php');
    // Get the total number of managers
    $query = "select * from managers;";
    $query_run = mysqli_query($connection,$query);
    $total_managers = mysqli_num_rows($query_run);

    // Get the total number of Pharmacists
    $query = "select * from pharmacists;";
    $query_run = mysqli_query($connection,$query);
    $total_pharmacists = mysqli_num_rows($query_run);

    // Get the total number of salesmans
    $query = "select * from salesmans;";
    $query_run = mysqli_query($connection,$query);
    $total_salesmans = mysqli_num_rows($query_run);

    // Get total sale
    $query = "select sum(total_sale) as 'sum_of_sale' from salesmans;";
    $query_run = mysqli_query($connection,$query);
    $total_sale = 0;
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        $total_sale = $row['sum_of_sale'];
    }

    // Add Manager
    if(isset($_POST['add_manager'])){
        $query = "insert into managers values(null,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$_POST[mobile],'manager')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Manager Added Successfully...');
            window.location.href = 'dashboard.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error....!! Plz try again.');
            window.location.href = 'dashboard.php';
            </script>";
        }
     }

    //  Add Pharmacist
     if(isset($_POST['add_pharmacist'])){
        $query = "insert into pharmacists values(null,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$_POST[mobile],'pharmacist')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Pharmacist Added Successfully...');
            window.location.href = 'dashboard.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error....!! Plz try again.');
            window.location.href = 'dashboard.php';
            </script>";
        }
     }

     //  Add Salesman
     if(isset($_POST['add_salesman'])){
        $query = "insert into salesmans values(null,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$_POST[mobile],'salesman',0)";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Salesman Added Successfully...');
            window.location.href = 'dashboard.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error....!! Plz try again.');
            window.location.href = 'dashboard.php';
            </script>";
        }
     }
    //  update password
     if(isset($_POST['update_password'])){
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
        if($_POST['old_password'] == $old_password){
            if($_SESSION['role'] == "admin"){
                $query = "update admins set password = '$_POST[new_password]' where id = $_SESSION[uid]";
            }
            elseif($_SESSION['role'] == "managers"){
                $query = "update managers set password = '$_POST[new_password]' where id = $_SESSION[uid]";
            }
            elseif($_SESSION['role'] == "pharmacist"){
                $query = "update pharmacists set password = '$_POST[new_password]' where id = $_SESSION[uid]";
            }
            else{
                $query = "update salesmans set password = '$_POST[new_password]' where id = $_SESSION[uid]";
            }
            $query_run = mysqli_query($connection,$query);
            if($query_run){
                echo "<script type='text/javascript'>
                alert('Password updated successfully...');
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
        else{
            echo "<script type='text/javascript'>
                alert('Enter Correct Password');
                window.location.href = 'dashboard.php';
            </script>";
        }
    }
    // update total sale
    if(isset($_POST['update_sale'])){
        include('includes/connection.php');
        $query = "update salesmans set total_sale = $_POST[total_sale] where id = $_SESSION[uid];"; 
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('Total sale updated successfully...');
                window.location.href = 'dashboard.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error..Plz try again !!!');
                window.location.href = 'dashboard.php';
            </script>";
        }
    }

    // update Sold Item in stock
    if(isset($_POST['update'])){
        include('includes/connection.php');
        $available = 0;
        $query1 = "select stock from medicines where name = '$_POST[name]';";
        $query_run1 = mysqli_query($connection,$query1);
        while($row = mysqli_fetch_assoc($query_run1)){
            $available = $row['stock'];
        }
        $new_stock = $available - $_POST['qty'];
        $query = "update medicines set stock = $new_stock where name = '$_POST[name]';";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('Stock updated successfully...');
                window.location.href = 'dashboard.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error..Plz try again !!!');
                window.location.href = 'dashboard.php';
            </script>";
        }
    }

    //  Add Prescription
     if(isset($_POST['add_prescription'])){
        $query = "insert into prescriptions values(null,$_POST[p_no],'$_POST[p_name]','$_POST[medicine]','$_POST[dose]','$_POST[p_date]','$_POST[remark]')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Prescription saved Successfully...');
            window.location.href = 'dashboard.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error....!! Plz try again.');
            window.location.href = 'dashboard.php';
            </script>";
        }
     }
?>
<html>
    <head>
        <title>Pharmacy Management System</title>
        <!-- CSS File -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- jQuery files -->
        <script src="jquery/jQuery.min.js"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <script>
            // Load add manager page
            $(document).ready(function(){
                $("#link1").click(function(){
                    $("#content").load("addManager.php");
                });
            });

            // Load add Pharmacist page
            $(document).ready(function(){
                $("#link3").click(function(){
                    $("#content").load("addPharmacist.php");
                });
            });

            // Load add Salesman page
            $(document).ready(function(){
                $("#link5").click(function(){
                    $("#content").load("addSalesman.php");
                });
            });

            // Load action Manager page
            $(document).ready(function(){
                $("#link2").click(function(){
                    $("#content").load("actionManager.php");
                });
            });

            // Load action Pharmacists page
            $(document).ready(function(){
                $("#link4").click(function(){
                    $("#content").load("actionPharmacist.php");
                });
            });

            // Load action Salesmans page
            $(document).ready(function(){
                $("#link6").click(function(){
                    $("#content").load("actionSalesman.php");
                });
            });

            // Load change password page
            $(document).ready(function(){
                $("#change_password").click(function(){
                    $("#content").load("changePassword.php");
                });
            });

            // Load update sale page
            $(document).ready(function(){
                $("#link7").click(function(){
                    $("#content").load("updateSale.php");
                });
            });

            // Load update sold Items page
            $(document).ready(function(){
                $("#link8").click(function(){
                    $("#content").load("updateItem.php");
                });
            });

            // Load get stock page
            $(document).ready(function(){
                $("#link9").click(function(){
                    $("#content").load("getStock.php");
                });
            });

            // Load prescription page
            $(document).ready(function(){
                $("#link10").click(function(){
                    $("#content").load("addPrescription.php");
                });
            });

            $(document).ready(function(){
                $("#link11").click(function(){
                    $("#content").load("viewPrescription.php");
                });
            });

        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="row" id="header">
                <div class="col-md-7">
                    <h3><b>Pharmacy Management System</b></h3>
                </div>
                <div class="col-md-2" style="padding-top:8px;color:yellow;">
                    <b><?php echo $_SESSION['fname'] ; echo " "; echo $_SESSION['lname']; echo "(" . $_SESSION['role'] . ")";?></b>
                </div>
                <div class="col-md-3">
                    <div class="dropdown">
                        <button class="dropbtn">Action</button>
                        <div class="dropdown-content">
                            <a href="#" id="change_password">Change Password</a>
                            <a href="logout.php">Logout</a>
                        </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2" id="sidebar">
                    <div class="sidebar-header"><br>
                        <h3 style="padding-left: 25px;"><b>PMS</b></h3><br>
                    </div>
                    <?php if($_SESSION['role'] == "admin" || $_SESSION['role'] == "manager"){
                    ?>
                        <ul>
                            <li><i class="fa fa-table" style="margin-right: 7px;font-size: 20px;"></i><a href="dashboard.php">Dashboard</a></li>
                            <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a>Manage Manager</a></li>
                            <ul>
                                <li id="link1"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Manager</a></li>
                                <li id="link2"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Edit Manager</a></li>
                            </ul>
                            <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a>Manage Pharmacist</a></li>
                            <ul>
                                <li id="link3"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Pharmacist</a></li>
                                <li id="link4"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Edit Pharmacist</a></li>
                            </ul>
                            <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a>Manage Salesman</a></li>
                            <ul>
                                <li id="link5"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Salesman</a></li>
                                <li id="link6"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Edit Salesman</a></li>
                            </ul>
                        </ul>
                    <?php
                    }
                    elseif($_SESSION['role'] == "pharmacist"){
                        ?>
                        <ul>
                            <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a href="#">Manage Pharmacist</a></li>
                            <ul>
                                <li id="link3"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Pharmacist</a></li>
                                <li id="link4"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Edit Pharmacist</a></li>
                            </ul>
                            <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a href="#">Manage Salesman</a></li>
                            <ul>
                                <li id="link5"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Salesman</a></li>
                                <li id="link6"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Edit Salesman</a></li>
                            </ul>
                            <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a href="#">Manage Prescription</a></li>
                            <ul>
                                <li id="link10"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Prescription</a></li>
                                <li id="link11"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">View Prescription</a></li>
                            </ul>
                            <li id="link9"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Check stock</a></li>
                        </ul>
                    <?php
                    }
                        else{ 
                        ?>
                          <ul>
                                <li><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 20px;"></i><a >Manage Salesman</a></li>
                                <ul>
                                    <li id="link5"><i class="fa fa-user-plus" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Add Salesman</a></li>
                                    <li id="link6"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Edit Salesman</a></li>
                                    <li id="link7"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Update total Sale</a></li>             
                                </ul>
                                <li id="link8"><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="#">Update sold Item</a></li>
                                <li><i class="fa fa-pencil-square-o" style="margin-right: 7px;font-size: 18px;"></i><a href="printReceipt.php" target="_blank">Print Receipt</a></li>
                            </ul>  
                        <?php } ?>
                </div>
                <div class="col-md-10" id=content>
                    <div class="row">
                        <div class="col-md-2" id="card1">
                            <h5>Total Managers: <br><br><?php echo $total_managers;?></h5>
                        </div>
                        <div class="col-md-2" id="card2">
                        <h5>Total Pharmacists: <br><br><?php echo $total_pharmacists;?></h5>
                        </div>
                        <div class="col-md-2" id="card3">
                        <h5>Total salesmans: <br><br><?php echo $total_salesmans;?></h5>
                        </div>
                        <div class="col-md-2" id="card4">
                        <h5>Total sale:<br><br> Rs.<?php echo $total_sale; ?></h5>
                        </div>
                    </div>
                </div>
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
