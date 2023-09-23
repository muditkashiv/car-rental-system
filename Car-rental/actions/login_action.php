<?php
// Session Start
session_start();
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connecting database by including connect page
include("../inc/connect.php");

//Fetching Data From Form Of Customer Sign In Page
if (isset($_POST['submit'])) {
  $userId = $_POST['email'];
  $password = $_POST['password'];

  //Comparing Input Data With Customer Table's Data
  $sql = "select * from customer where email_id='$userId' and password='$password'";
  //die($sql);
  $qry = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($qry);
  if ($row) {

    //If Input Data Is Same To Customer Table Data Then Head To Customer Index Page
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    header('location:../index.php');
  } else {
    //If Input Data Is Not Same To Customer Table Data Then Head To Customer Login Page
    header('location:../index.php?message=Invalid Username Or Password');
  }
}