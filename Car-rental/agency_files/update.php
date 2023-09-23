<?php
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

// connecting database by including connect page
include("../inc/connect.php");
//var_dump($_POST);

// Fetching Data From Form Of Edit Modal To Update
if (isset($_POST['edit_id2'])) {
    $edit_id = $_POST["edit_id2"];
    $model = mysqli_real_escape_string($conn, $_POST["model"]);
    $number_plate = mysqli_real_escape_string($conn, $_POST["number_plate"]);
    $seats = mysqli_real_escape_string($conn, $_POST["seats"]);
    $rent = mysqli_real_escape_string($conn, $_POST["rent"]);
    //$filename = $_FILES["filetoupload"]["name"];
    //$tempname = $_FILES["filetoupload"]["tmp_name"];
    //$folder = "uploads/" . $filename;
    //move_uploaded_file($tempname, $folder);

    // Updating Data In Cars Table
    $sql2 = "UPDATE cars SET model='$model', car_number='$number_plate', seats='$seats', rent='$rent' WHERE id=$edit_id";

    //die($sql);
    $qry2 = mysqli_query($conn, $sql2);
    if ($qry2) {

        // Heading To Available Cars Page
        header('location:available.php');
    }
}