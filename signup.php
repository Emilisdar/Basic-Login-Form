<?php

// Sign up Code for creating the account and error checking

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];  
    $pwd = $_POST["pwd"]; 
    $pwdRpt = $_POST["pwdRpt"];
    
// Including databse and functions file to make a connection
    require_once 'dbh.php';
    require_once 'functions.php';

// Error checking IF statment codes
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRpt) !== false) {
        header("location: signupform.php?error=emptyinput");
        exit();
    }

        if (invalidUid($username) !== false) {
            header("location: signupform.php?error=invaliduid");
            exit();
        }

    if (invalidEmail($email) !== false) {
        header("location: signupform.php?error=invalidemail");
        exit();
    }
    
        if (pwdMatch($pwd, $pwdRpt) !== false) {
            header("location: signupform.php?error=passwordsdontmatch");
            exit();
        }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: signupform.php?error=usernametaken");
        exit();
    }
// if everything is good then it creates the user
    createUser($conn, $name, $email, $username, $pwd);

}
// extra code to take you back to the signup page if the IF statment isn't excuted
else {
    header("location: signupform.php");
    exit();
}