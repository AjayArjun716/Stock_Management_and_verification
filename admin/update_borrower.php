<?php include('partials/menu.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f1f1f1;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  position: absolute;
  left: 26%;
}

/* Full-width input fields */
input[type=text], input[type=BorrowerName] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=BorrowerName]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: white;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>


 
    <h1>update borrower</h1>
    <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM borrower WHERE id=$id";
            $res= mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $b_name = $row['b_name'];
                    $date_of_issue = $row['date_of_issue'];
                    $date_of_return=$row['date_of_return'];
                }
                else
                {
                    header('location:' .SITEURL.'admin/borrower.php');
                }
            }
        ?>

    
   <form action="" method="POST">
   	 <div class="container">
            <table class="tbl-30">
                <tr>
                    <td>borrower Name:</td>
                    <td>
                        <input type="text" name="b_name" value="<?php echo $b_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Date of issue:</td>
                    <td>
                        <input type="text" name="date_of_issue" value="<?php echo $date_of_issue; ?>">
                    </td>
                </tr>
                 <tr>
                    <td>Date of return:</td>
                    <td>
                        <input type="text" name="date_of_return" value="<?php echo $date_of_return; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="submit" name="submit" value="Update borrower" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

</body>
</html>
<?php
  if(isset($_POST['submit']))
  {
      $id =$_POST['id'];
      $b_name =$_POST['b_name'];
      $date_of_issue =$_POST['date_of_issue'];
      $date_of_return=$_POST['date_of_return'];

      $sql = "UPDATE borrower SET
               b_name = '$b_name',
               date_of_issue = '$date_of_issue',
               date_of_return='$date_of_return'
               WHERE id = '$id'
                 ";

       $res = mysqli_query($conn, $sql);

       if($res==true)
       {
          $_SESSION['update'] = "<div class = 'sucess'> borrower Updated Successfully </div>";
          echo "<script>window.location.href='borrower.php'</script>";
       }
       else
       {
           
          $_SESSION['update'] = "<div class = 'error'> borrower Not updated. Try Again </div>";
           echo "<script>window.location.href='borrower.php'</script>";
       }
 }
?>