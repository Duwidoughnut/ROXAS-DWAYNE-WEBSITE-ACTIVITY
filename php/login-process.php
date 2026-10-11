<?php
// Runs before any HTML on login.php. The form calls itself (action=""), like in the module.
session_start();

if (isset($_SESSION['username'])) {          // already logged in -> go to the landing page
    header('Location: landing.php');
    exit;
}

// define variables and set to empty values
$username = $password = "";
$usernameErr = $passwordErr = $loginErr = "";

if (isset($_POST['submit'])) {               // check if the submit button was clicked
    $ok = true;
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // username: required + regular expression
    if ($username == '') {
        $usernameErr = "Please enter your username";
        $ok = false;
    } elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $usernameErr = "Username must be 3-20 characters: letters, numbers or underscore, starting with a letter";
        $ok = false;
    }

    // password: required
    if ($password == '') {
        $passwordErr = "Please enter your password";
        $ok = false;
    }

    // everything is valid -> check the static credentials
    if ($ok) {
        if (($username == 'admin' && $password == '12345') || ($username == 'member' && $password == 'member123')) {
            $_SESSION['username'] = $username;
            header('Location: landing.php');
            exit;
        } else {
            $loginErr = "Invalid username or password.";
        }
    }
}
