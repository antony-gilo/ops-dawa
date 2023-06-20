<?php 

session_start();

require_once "../partials/conn.php";

if (isset($_POST['update_cart']) && $_POST['qty_id'] !== 1) {

    $id = settype($_POST['qty_id'], 'integer');
    $qty = $_POST['cart-qty'];

    

    foreach ($_SESSION['cart'] as $key => $value) {

        $cart_product_id = settype($value['product_id'], 'integer');

        if ($cart_product_id === $id) {
            
            $_SESSION['cart'][$key]['quantity'] = $qty;

            echo "<script> alert('Cart Updated');
            window.location.href='../cart.php';
           </script>";
        } 
    
    }

}