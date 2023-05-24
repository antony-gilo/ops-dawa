<?php
session_start();

error_reporting(error_reporting() & ~E_NOTICE);

session_destroy();
header('Location: index.php');