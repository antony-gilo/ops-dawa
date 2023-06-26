<?php 
session_start();

include('../partials/conn.php');

if (isset($_POST['place-order'])) {
    
    $customer_id = htmlentities($_SESSION['id-customer']);
    $address = htmlentities($_POST['address']);
    $city = htmlentities($_POST['city']);
    $phone = htmlentities($_POST['phone']);
    $email = htmlentities($_POST['email']);
    $payment = htmlentities($_POST['payment-method']);
    $total = htmlentities($_POST['total']);

    $order_query = "INSERT INTO orders (`customer_id`, `address`, `city`, `phone`, `email`, `total`) VALUES ('$customer_id', '$address', '$city', '$phone', '$email', '$total')";

    $insert = mysqli_query($conn, $order_query);

    $last_order_query = "SELECT MAX(id) FROM orders LIMIT 1";
    $last_id_result = mysqli_query($conn, $last_order_query);

    $result_id = mysqli_fetch_assoc($last_id_result);
    $order_id = $result_id['MAX(id)'];

    foreach ($_SESSION['cart'] as $key => $value) {
        
        $product_id = $value['product_id'];
        $quantity = $value['quantity'];

        $order_details_query = "INSERT INTO order_details (`order_id`, `product_id`, `quantity`) VALUES ('$order_id', '$product_id', '$quantity')";
        $insert_order_details = mysqli_query($conn, $order_details_query);

    }

    unset($_SESSION['cart']);
}