<?php
session_start();
 
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='ACCOUNTANT')
{
  echo "<script>window.location.assign('logintest.php')</script>";
}
?>