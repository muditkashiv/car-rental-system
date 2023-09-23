<?php
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// connecting database by including connect page

include("../inc/connect.php");

//Fetching Data From Form Input

$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$email = $_POST["email"];
$number = $_POST["number"];
$gst = $_POST["gst"];
$password = $_POST["password"];

//Inserting Data In Agencies Table In Database
$sql = "insert into agencies(company, name, email_id, mobile, password, gst) values ('$name1', '$name2', '$email', '$number', '$password', '$gst')";
//die($sql);
$qry = mysqli_query($conn, $sql);
if ($qry) {
    // Heading To Agent Register Page With Success Message
    header('location:../agent_login.php?message=Registration Successful! Now You Can Login');
} else {
    // Heading To Agent Register Page With Error Message
    header('location:../agent_login.php?message=Registration Failed. Please Try Again Later.');
}