<?php
$conn = mysqli_connect('localhost', 'root', '') or
        die('Unable to connect. Check your connection parameters.');
mysqli_select_db($conn, 'ops-dawa') or die(mysqli_error($conn));
