<?php 

include('../partials/conn.php');

if (isset($_POST['submit-product']) && !empty($_POST['product-name'])) {
 
    $product_name = htmlentities($_POST['product-name']);
    $product_price = 'Ksh. ' . htmlentities($_POST['product-price']);
    $product_desc = htmlentities($_POST['product-description']);
    $product_category = $_POST['product-category'];
    $category_id = '';

    foreach ($product_category as $value) {
        $category_id  .= $value . ',';

    }

    $product_desc = nl2br($product_desc);

    $allowed_ext = [
        'png',
        'PNG',
        'jpeg',
        'JPEG',
        'jpg',
        'JPG',
        'gif',
        'GIF'
    ];

    $errors = array();

    $uploaded_files = $_FILES['product-img'];

    $file_name = $uploaded_files['name'];
    $target_dir = '../admin/images/product_uploads/';

    $file_path = $target_dir . $file_name;
    $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
    $file_size = $uploaded_files['size'];
    $temp_location = $uploaded_files['tmp_name'];

    if (in_array($file_ext, $allowed_ext) === false) {
        $errors[] = 'The File Extensions Allowed are .GIF, .PNG and .JPEG/JPG.';
    }

    if ($file_size > 3145728) {
        $errors[] = 'File size MUST be Below 3.5MBs';
    }
    
    if (empty($errors)) {
        
        move_uploaded_file($temp_location, $file_path);

        $product_query = "INSERT INTO `products` (`id`, `product_name`, `price`, `product_description`, `product_pictures`, `category_id`) VALUES ('', '$product_name', '$product_price', '$product_desc', '$file_path', '$category_id')";

        $insert = mysqli_query($conn, $product_query);
                if ($insert) {
                    echo '<script type="text/javascript">
                            alert("Product Has Been Added Successfully!");
                            window.location = "../admin/products.php";
                        </script>';
                }

    } else {
        foreach ($errors as $error) {
            echo '<script type="text/javascript">
                    alert("' . $error . '");
                    window.history.back();
                </script>';
        }
    }
    

}