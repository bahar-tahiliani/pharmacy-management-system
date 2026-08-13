<?php
    session_start();
    if(isset($_SESSION['fname'])){
      include('includes/connection.php');
      $query = "delete from prescriptions where id = $_GET[pid]";
      $query_run = mysqli_query($connection,$query);
      if($query_run){
          echo "<script type='text/javascript'>
          alert('prescription deleted successfully...');
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
      header('location:index.php');
    }
?>
