<?php
    session_start();
    if(isset($_SESSION['fname'])){
    		include('includes/connection.php');
    		$query = "select name from medicines;";
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
                <center><h5>Add Prescription</h5></center>
                <form action="" method="post">
                	<div class="form-group">
                        <input type="text" class="form-control" name="p_no" placeholder="Patient No">
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="p_name" placeholder="Patient Name">
                    </div><br>
                    <div class="form-group">
                    	<select class="form-control" name="medicine">
                    	<option>-Select medicine-</option>
                    	<?php 
                    	while($row = mysqli_fetch_assoc($query_run)){
                    		?>
		        			<option><?php echo $row['name']; ?></option>
		        			<?php
		    			} ?>
                    </select>
                    </div><br>
                    <div class="form-group">
                    	<select class="form-control" name="dose">
                    	<option>-Select dose-</option>
                    	<option>1 dose</option>
                    	<option>2 dose</option>
                    	<option>3 dose</option>
                    </select>
                    </div><br>
                    <div class="form-group">
                        <input type="date" class="form-control" name="p_date" placeholder="Select date">
                    </div><br>
                    <div class="form-group">
                        <textarea class="form-control" name="remark">Remark...</textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="add_prescription">Save</button>
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
