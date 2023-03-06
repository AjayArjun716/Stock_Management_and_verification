<?php
   
   include('../constants/db.php');
   //get the id to be dltd
    $id = $_GET['id'];
   //create query to dlt admin
    $sql = "DELETE FROM admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
      // echo "Admin deleted";
      $_SESSION['delete'] = "<div class = 'sucess'> Admin Deleted SuccessFully</div>";
      echo "<script> window.location.href='admin.php'</script>";
    }
    else
    {
     // echo "admin not deleted";
     $_SESSION['delete'] = "<div class = 'error'>failed to delete. Try Again later.</div>";
     echo "<script> window.location.href='admin.php'</script>";

    }
   //redirect to manage admin page 
?>