<?php 
        session_start();
        define('SITEURL','http://localhost/Stock_Verification/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','');
        define('DB_NAME', 's_v');

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME ,DB_PASSWORD) or die(mysqli_error());
        $db_select = mysqli_select_db($conn,'s_v') or die(mysqli_error());
?>