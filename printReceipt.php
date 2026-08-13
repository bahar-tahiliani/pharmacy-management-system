<?php
	$total_price = 0;
	$m_name = "";
	$p_no = 0;
	$p_name = "";
	$dose = "";
	if(isset($_POST['get_receipt'])){
		include('includes/connection.php');
		$query = "SELECT * from prescriptions where p_no = $_POST[pno]";
	    $query_run = mysqli_query($connection,$query);
	    while($row = mysqli_fetch_assoc($query_run)){
	    	$p_no = $row['p_no'];
	    	$p_name = $row['p_name'];
	    	$m_name = $row['medicine'];
	    	$dose = $row['dose'];
	    }

	    $query1 = "SELECT price from medicines where name = '$m_name'";
	    $query_run1 = mysqli_query($connection,$query1);
	    while($row = mysqli_fetch_assoc($query_run1)){
	    	$total_price =  $total_price + $row['price'];
	    }
	}
?>
<!DOCTYPE html>
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
<body><br><br>
	<div class="row">
		<div class="col-md-6 m-auto">
			<form action="" method="POST">
				<label>Patient No:</label>
				<div class="form-group">
					<input type="text" class="form-control" name="pno" placeholder="Patient No.">
				</div><br>
				<button type="submit" name="get_receipt">Get Receipt</button>
			</form><br>
		</div><hr><br>
	</div>
	<div class="row">
		<div class="col-md-12 m-auto">
			<center><h4>Name of the Pharmacy goes here</h4></center>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 m-auto">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Patient No:</th>
						<th>Patient Name:</th>
						<th>Medicine:</th>
						<th>Dose:</th>
						<th>Total Price:</th>
					</tr>
				</thead>
				<tr>
					<td><?php echo $p_no; ?></td>
					<td><?php echo $p_name; ?></td>
					<td><?php echo $m_name; ?></td>
					<td><?php echo $dose; ?></td>
					<td><?php echo $total_price; ?></td>
				</tr>
			</table><br>
			<button class="btn btn-danger"><a href="" download></a>Download</button>
		</div>
	</div>
</body>
</html>