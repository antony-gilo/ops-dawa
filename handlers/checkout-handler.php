<?php 
session_start();

$total_payment =  $_GET['total'];

if (isset($_SESSION['id-customer'])) {

    header('Location: ../checkout.php');
} else {
    
    header('Location: ../login.php');
}