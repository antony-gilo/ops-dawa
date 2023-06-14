<?php 

session_start();
require_once "../partials/conn.php";

if (isset($_POST['edit_cart'])) {

    $id = $_POST['cart_id'];
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    foreach ($_SESSION['cart'] as $key => $value) {

        if ($value['product_id'] == $id) {
            
            unset($_SESSION['cart'][$key]);
            
            echo "<script> alert('Product Removed From Cart');
            window.location.href='../cart.php';
           </script>";
        }

    }

}