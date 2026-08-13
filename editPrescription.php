<?php
    session_start();
    if(isset($_SESSION['fname'])){
        include('includes/connection.php');
    if(isset($_POST['update_prescription'])){
        $query = "update prescriptions set p_no = $_POST[p_no],p_name = '$_POST[p_name]',medicine = '$_POST[medicine]',dose = '$_POST[dose]',date = '$_POST[p_date]',remark = '$_POST[remark]' where id = $_SESSION[p_id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('prescription updated successfully...');
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
    $query = "select * from prescriptions where id = $_GET[pid];";
    $query_run = mysqli_query($connection,$query);
    $pno = "";
    $p_name = "";
    $medicine = "";
    $dose = "";
    $date = "";
    $remark = "";
    if(mysqli_num_rows($query_run)){
        while($row = mysqli_fetch_assoc($query_run)){
            $_SESSION['p_id'] = $row['id'];
            $pno = $row['p_no'];
            $p_name = $row['p_name'];
            $medicine = $row['medicine'];
            $dose = $row['dose'];
            $date = $row['date'];
            $remark = $row['remark'];
        }
    }
    else{
        echo "<script type='text/javascript'>
            alert('No data found !!!');
            window.location.href = 'dashboard.php';
        </script>";
    }

    $query1 = "select name from medicines;";
    $query_run1 = mysqli_query($connection,$query1);

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
                <center><h5>Edit Prescription Page</h5></center>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="p_no" placeholder="Patient No" value="<?php echo $pno; ?>">
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="p_name" placeholder="Patient Name" value="<?php echo $p_name; ?>">
                    </div><br>
                    <div class="form-group">
                        <select class="form-control" name="medicine">
                        <option><?php echo $medicine; ?></option>
                        <?php 
                        while($row = mysqli_fetch_assoc($query_run1)){
                            ?>
                            <option><?php echo $row['name']; ?></option>
                            <?php
                        } ?>
                    </select>
                    </div><br>
                    <div class="form-group">
                        <select class="form-control" name="dose">
                        <option><?php echo $dose; ?></option>
                        <option>1 dose</option>
                        <option>2 dose</option>
                        <option>3 dose</option>
                    </select>
                    </div><br>
                    <div class="form-group">
                        <input type="date" class="form-control" name="p_date" value="<?php echo $date; ?>">
                    </div><br>
                    <div class="form-group">
                        <textarea class="form-control" name="remark"><?php echo $remark; ?></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="update_prescription">Update</button>
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
    