<?php

$name = $email = $phone = $username = "";
$plan = "monthly";
$nameErr = $emailErr = $phoneErr = $usernameErr = $passwordErr = $confirmErr = $planErr = "";
$success = "";

if (isset($_POST['submit'])) {
    $ok = true;
    $name     = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone    = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm  = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $plan     = isset($_POST['plan']) ? $_POST['plan'] : '';

    // name: letters and white space only 
    if ($name == '') {
        $nameErr = "Please enter your full name";
        $ok = false;
    } elseif (!preg_match("/^[a-zA-ZñÑ ]+$/u", $name)) {
        $nameErr = "Only letters and white space allowed";
        $ok = false;
    }

    // email validation
    if ($email == '') {
        $emailErr = "Please enter your email address";
        $ok = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $ok = false;
    }

    
    if ($phone != '' && !preg_match("/^(\+63|0)9[0-9]{9}$/", str_replace(' ', '', $phone))) {
        $phoneErr = "Enter a PH mobile number like 0917 123 4567";
        $ok = false;
    }

    
    if ($username == '') {
        $usernameErr = "Please choose a username";
        $ok = false;
    } elseif (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,19}$/", $username)) {
        $usernameErr = "Username must be 3-20 characters: letters, numbers or underscore, starting with a letter";
        $ok = false;
    }

    
    if ($password == '') {
        $passwordErr = "Please enter a password";
        $ok = false;
    } elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9]).{6,}$/", $password)) {
        $passwordErr = "Password needs at least 6 characters with a letter and a number";
        $ok = false;
    }

    // confirm password must match
    if ($confirm == '') {
        $confirmErr = "Please confirm your password";
        $ok = false;
    } elseif ($confirm != $password) {
        $confirmErr = "Passwords do not match";
        $ok = false;
    }

    // plan: weekly or monthly
    if ($plan != 'weekly' && $plan != 'monthly') {
        $planErr = "Please choose a subscription plan";
        $ok = false;
    }

    // if login is success
    if ($ok) {
        $success = "Registration successful, " . htmlspecialchars($name) . "! you may now login. ";
        $name = $email = $phone = $username = "";
    }
}
