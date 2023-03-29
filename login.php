<?php

// Login Code for creating the account and error checking

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd= $_POST["pwd"];

// Including databse and functions file to make a connection
    require_once 'dbh.php';
    require_once 'functions.php';

    // basic error checking if nothing is submitted
        if (emptyInputLogin($username, $pwd) !== false) {
        header("location: loginform.php?error=emptyinput");
        exit();
    }
    // If everythings is correct user is logged to their account 
    loginUser($conn, $username, $pwd);
}
// extra code to take you back to the login page if the IF statment isn't excuted
else {
    header("location: loginform.php");
    exit();
}