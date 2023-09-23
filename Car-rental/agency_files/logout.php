<?php
//Session Start
session_start();
//Session Destroy After Clicking On Logout Button
if (session_destroy()) {
    // Heading To Agent Register Page With Message
    header("location: ../index.php?message=You Have Been Logout Out. If It Was A Mistake Than Click On Sign In Button Again.");
}
