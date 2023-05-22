<?php 

include('../partials/conn.php');

if (isset($_POST['submit-category']) && !empty($_POST['category-name'])) {
 
    $category = htmlentities($_POST['category-name']);
    
    $contact_query = "INSERT INTO categories (`category_name`) VALUES ('$category')";
    $insert = $conn->query($contact_query);
    
    if ($insert) {
        header('Location: ../admin/categories.php');
    }

}





