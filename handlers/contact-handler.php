<?php 

include('../partials/conn.php');

if (isset($_POST['submit-contact']) && !empty($_POST['contact-email'])) {
 
    $email = htmlentities($_POST['contact-email']);
    $message = htmlentities($_POST['contact-message']);
    
    $message = nl2br($message);
    
    $contact_query = "INSERT INTO contacts (`email`, `message`) VALUES ('$email', '$message')";
    $insert = $conn->query($contact_query);
    
    if ($insert) {
        header('Location: ../contact.php');
    }

}





