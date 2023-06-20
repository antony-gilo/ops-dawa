<?php
session_start();

error_reporting(error_reporting() & ~E_NOTICE);

include('../partials/conn.php');

$_SESSION['username'] = NULL;
$_SESSION['id-customer'] = NULL;

unset($_SESSION['username']);
unset($_SESSION['id-customer']);

if (isset($_POST['login-button']) && !empty($_POST['email'])) {

    $supplied_password = htmlentities($_POST['password']);

    $query = "SELECT * FROM customers WHERE  email ='" . $_POST['email'] . "'";

    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    $row = mysqli_fetch_array($result);
    $hashed_password = $row['password'];

    $verify = password_verify($supplied_password, $hashed_password);
    // var_dump($verify);
    // exit;

    if ($count === 0 || !$verify) {

        echo '<script type="text/javascript">
                            alert("Wrong Email/Password Combination Given!");
                            window.history.back();
                        </script>';
                        
    } elseif (isset($_SESSION['cart'])) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['full_names'] = $row['full_names'];
        $_SESSION['id-customer'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        echo '<script type="text/javascript">
                window.location = "../cart.php";
            </script>';
    } else {
        
        $_SESSION['username'] = $row['username'];
        $_SESSION['full_names'] = $row['full_names'];
        $_SESSION['id-customer'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        echo '<script type="text/javascript">
                window.location = "../index.php";
            </script>';
    }
}