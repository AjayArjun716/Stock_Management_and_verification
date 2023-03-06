<?php
     include('../constants/db.php');

   session_destroy();

   header('location:'.SITEURL.'admin/login.php');
 
 
 
 ?>