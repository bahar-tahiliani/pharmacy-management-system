<?php
    session_start();
    if(isset($_SESSION['fname'])){
      include('includes/connection.php');
      $query = "delete from pharmacists where id = $_GET[uid]";
      $query_run = mysqli_query($connection,$query);
      if($query_run){
          echo "<script type='text/javascript'>
          alert('Pharmacist deleted successfully...');
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