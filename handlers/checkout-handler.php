<?php 
session_start();

$total_payment =  $_GET['total'];

$_SESSION['cart_total'] = $total_payment;

if (isset($_SESSION['id-customer']) && isset($_SESSION['cart'])) {
    
    header('Location: ../checkout.php');
} else {
    
    header('Location: ../login.php');
}