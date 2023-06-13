<?php 
session_start();

if (isset($_SESSION['cart'])) { 

    $checker = array_column($_SESSION['cart'], 'product_name'); 

    if (in_array($_GET['product_name'], $checker)) {

        echo "<script> alert('Product Already In Cart');
            window.location.href='../shop.php';
           </script>";
    } else {
        
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = [
            'product_id' => $_GET['product_id'],
            'product_name' => $_GET['product_name'],
            'product_price' => $_GET['product_price'],
        ];
    
        echo "<script> alert('Product Added To Cart');
                window.location.href='../shop.php';
               </script>";
    }

} else {

    $_SESSION['cart'][0] = [
        'product_id' => $_GET['product_id'],
        'product_name' => $_GET['product_name'],
        'product_price' => $_GET['product_price'],
    ];

    echo "<script> alert('Product Added To Cart');
            window.location.href='../shop.php';
          </script>";
}

    