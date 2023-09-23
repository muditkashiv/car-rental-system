<?php
// Session Start
session_start();

// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

// connecting database by including connect page
include("../inc/connect.php");

//Fetching Data From Form Of Agent Sign In Page

if (isset($_POST['submit'])) {
  $userId = $_POST['admin_email'];
  $password = $_POST['admin_pass'];
  //Comparing Data With Agencies Table's Data
  $sql = "select * from agencies where email_id='$userId' and password='$password'";
  //die($sql);
  $qry = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($qry);
  if ($row) {

    //If Input Data Is Same To Agencies Table Data Then Head To Agent Dashboard Page
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['company'] = $row['company'];
    header('location:../agency_files/dashboard.php');
  } else {
    //If Input Data Is Not Same To Agencies Table Data Then Head To Agent Register Page
    header('location:../agent-register.php?message=Invalid Username Or Password');
  }
}