<?php
// logout.php

session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: /prj/acceuil"); // Adjust the URL as needed
exit();
?>