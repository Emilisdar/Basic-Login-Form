<?php
// All of the functions which work error handling, and connection between other files

        // Function to check whether the input boxes are empty before creating the account
function emptyInputSignup($name, $email, $username, $pwd, $pwdRpt) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRpt))
    {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
        // Function which only allows regualr characters to be used for username
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

        // Function to check whether email is correct
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
        // Function to check whether passwords match
function pwdMatch($pwd, $pwdRpt) {
    $result;
    if ($pwd !== $pwdRpt) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

         // Function to check whether the username already exists
function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: loginform.php?error=stmtfailed");
        exit();
    }
    // Function of fetching the username data from the databse to compare to the entered one
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}
            // Function to create the user
    function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signupform.php?error=stmtfailed");
        exit();
    }
    // Function to has users password when submitting to the database
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // Respond that there is no error with signing up
    header("location: signupform.php?error=none");
    exit();
}
        // Function to check whether login inputs are empty
function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd))
    {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
        // Function to login the user
function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
        // Function to check whether the username already exists
    if ($uidExists === false) {
    header("location: loginform.php?error=wronglogin");
    exit();
    }
    // Function to allow the user to login by equaling their entered password to their hashed one
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    // Function to check whether password is correct
    if($checkPwd === false) {
    header("location: loginform.php?error=wronglogin");
    exit();
    }
    // Function to to allow the user to login when the checked password is true
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: home.php");
        exit();
    }
}