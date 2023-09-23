<?php
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

// connecting database by including connect page
include("../inc/connect.php");

//Fetching Data From Form Of Agencies Page
$agent_id = $_POST["agent_id"];
$model = mysqli_real_escape_string($conn, $_POST["model"]);
$number_plate = mysqli_real_escape_string($conn, $_POST["number_plate"]);
$seats = mysqli_real_escape_string($conn, $_POST["seats"]);
$rent = mysqli_real_escape_string($conn, $_POST["rent"]);

$filename = $_FILES["filetoupload"]["name"];
$tempname = $_FILES["filetoupload"]["tmp_name"];
$folder = "../uploads/" . $filename;
move_uploaded_file($tempname, $folder);

//die();
//Inserting Data In Cars Table In Database
$sql = "insert into cars(agent_id, model, image, car_number, seats, rent) values ('$agent_id', '$model', '$filename', '$number_plate', '$seats', '$rent')";
//echo $sql;
//die($sql);
$qry = mysqli_query($conn, $sql);
if ($qry) {
   // Heading To Available Cars PAge
   header('location:available.php');
}