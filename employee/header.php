<?php
include '../db_connect.php';
if(!isset($_SESSION['employee'])){
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Mobile Showroom</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin-style.css">
</head>
<body>
    <!-- Header Section -->
    <header class="admin-header d-flex justify-content-between align-items-center px-4 py-2">
        <h3 class="project-title"><a href="home.php" class="text-white text-docoration-none">Online Mobile Showroom</a></h3>
        <a href="#" class="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </header>

    <!-- Sidebar Section -->
    <div class="d-flex">
        <nav class="sidebar bg-dark">
            <ul class="list-unstyled">
                <li><a href="home.php" class="sidebar-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="mobile.php" class="sidebar-link"><i class="fa-solid fa-mobile-screen-button"></i> Mobile</a></li>
                <li><a href="order.php" class="sidebar-link"><i class="fas fa-shopping-cart"></i> Order</a></li>
                <li><a href="customer.php" class="sidebar-link"><i class="fas fa-users"></i> Customer</a></li>
                <li><a href="feedback.php" class="sidebar-link"><i class="fas fa-comments"></i> Feedback</a></li>
                <li><a href="contact.php" class="sidebar-link"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="logout.php" class="sidebar-link"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>