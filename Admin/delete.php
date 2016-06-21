<?php
include('includes/db_connect.php');
  //include("db.php");
  if(isset($_GET['patient_id'])!="")
  {
  $patient_id=$_GET['patient_id'];
  $patient_id=mysqli_query("DELETE FROM patient WHERE patient_id='$patient_id'");
  $run_delete= mysqli_query($con, $patient_id);
  if($patient_id)
  {
      header("Location:patientlist.php");
  }
  else
  {
      echo mysqli_error($con);
  }
  }

?>
