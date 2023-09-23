<?php
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

// connecting database by including connect page
include("../inc/connect.php");

//Fetching Data From Form Input
$car_id = $_POST["car_id"];
$customer_id = $_POST["customer_id"];
$pickup = mysqli_real_escape_string($conn, $_POST["pickup"]);
$drop = mysqli_real_escape_string($conn, $_POST["drop"]);
$start_date = mysqli_real_escape_string($conn, $_POST["start_date"]);
$filter_config = $_POST["filter_config"];

//die();
//Inserting Data In Booked_Car Table In Database
$sql = "insert into booked_car(customer_id, car_id, pickup, dropl, date, no_of_days) values ('$customer_id', '$car_id', '$pickup', '$drop', '$start_date', '$filter_config')";
//echo $sql;
//die($sql);
$qry = mysqli_query($conn, $sql);
if ($qry) {

   // Heading To Index Page With Message
   header('location:../index.php?message=Thank You.Your Car Has Been Booked');
}