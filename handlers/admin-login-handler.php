<?php
session_start();

error_reporting(error_reporting() & ~E_NOTICE);

include('../partials/conn.php');

$_SESSION['username'] = NULL;
$_SESSION['id-admin'] = NULL;

unset($_SESSION['username']);

if (isset($_POST['login-button']) && !empty($_POST['email'])) {

    $supplied_password = htmlentities($_POST['password']);

    $query = "SELECT * FROM admins WHERE  email ='" . $_POST['email'] . "'";

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
                            window.location = "../admin/admin-login.php";
                        </script>';
    } else {

        $_SESSION['username'] = $row['username'];
        $_SESSION['full_names'] = $row['full_names'];
        $_SESSION['id-admin'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        echo '<script type="text/javascript">
                window.location = "../admin/index.php";
            </script>';
    }
}