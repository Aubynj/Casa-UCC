<?php
session_start();
if(!isset($_SESSION['adminId'])){
  header("Location: index");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_ad.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <title>Administrator | Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a href="" class="navbar-brand">CASA UCC</a>
      <ul class="nav">
        <li class="nav-item">
          <a href="logout"><button type="button" class="btn btn-outline-success btn-custom1">Sign out</button></a>
        </li>
      </ul>
    </nav>
    <section class="dropdownLoader">
      <i class="fa fa-check icon-success"></i>
      <i class="fa fa-warning icon-error"></i>
      <img src="../assets/img/dropdown-loader.gif" class="dropdown-loader">
      <span class="dropdown-text"><b></b></span>
    </section>
