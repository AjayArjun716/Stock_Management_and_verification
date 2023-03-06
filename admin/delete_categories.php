<?php
include('../constants/db.php');

$id = $_GET['stock_id'];
$sql = "DELETE FROM `categories` WHERE stock_id='$id'";
$res = mysqli_query($conn, $sql);
if($res==TRUE)
{
    $_SESSION['delete'] = " Deleted Succesfully";
    echo "<script>window.location.href='categories.php'</script>";
}
else
{
    $_SESSION['delete'] = "Failed To Delete." . mysqli_error($conn);
    echo "<script>window.location.href='categories.php'</script>";
}
?>