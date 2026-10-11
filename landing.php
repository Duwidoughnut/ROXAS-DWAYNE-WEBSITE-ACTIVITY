<?php
session_start();
if (!isset($_SESSION['username'])) {   // landing page is only for logged-in users
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | FitPulse</title>
  <link rel="icon"
    href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='10' fill='%23C6F432'/%3E%3Cpath d='M5 21h7l3-9 5 18 4-13 2 4h9' stroke='%230E1116' stroke-width='2.6' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E">
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/fitpulse.css">
  
</head>

<body class="">
  <?php include 'php/nav.php'?>
  <?php include 'php/welcome-bar.php'?>
  <?php include 'php/landing-caroussel.php' ?>
  <?php include 'php/plans.php' ?>
  <?php include 'php/features.php' ?>
  <?php include 'php/footer.php' ?>
</body>
</html>