<?php

error_reporting(error_reporting() & ~E_NOTICE);
include('../partials/conn.php');

if (isset($_POST['register-button']) && !empty($_POST['email'])) {

    $full_names = htmlentities($_POST['f-name']) . ' ' . htmlentities($_POST['l-name']);
    $username = strtolower($_POST['f-name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat-password'];

    if ($password !== $repeat_password) {
        echo '<script type="text/javascript">
                            alert("Passwords Do Not Match!");
                            window.history.back();
                        </script>';
    }

    $exist_query = "SELECT * FROM `customers` WHERE email = '$email'";
    $result = mysqli_query($conn, $exist_query);

    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">
                        alert("A User With That Email Already Exists!");
                        window.history.back();
                    </script>';
    }else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10,]);

        $register_query = "INSERT INTO customers (`full_names`, `username`, `email`, `password`) VALUES ('$full_names', '$username', '$email', '$hashed_password')";

        $insert = $conn->query($register_query);

        if ($insert) {
            header('Location: ../login.php');
        }
        
    }

    
}