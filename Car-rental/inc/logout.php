<?php
//Session Start
session_start();
//Session Destroy After Clicking On Logout Button
if (session_destroy()) {
    // Heading Index Page
    header("location:../index.php");
}