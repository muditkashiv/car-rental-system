<?php
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connecting database by including connect page
include("../inc/connect.php");

//Fetching Data From Form Of Customer Sign Up Page
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$password = $_POST["pass"];

//Inserting Data In Customer Table In Database
$sql = "insert into customer(name, email_id, mobile, password) values ('$name', '$email', '$number', '$password')";
//die($sql);
$qry = mysqli_query($conn, $sql);
if ($qry) {
    // Heading To Customer Index Page With Success Message
    header('location:../index.php?message=Registration Successful! Now You Can Login');
} else {
    // Heading To Customer Index Page With Error Message
    header('location:../index.php?message=Registration Failed. Please Try Again Later.');
}