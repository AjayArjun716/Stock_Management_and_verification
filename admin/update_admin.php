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
input[type=text], input[type=StockName] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=StockName]:focus {
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

<form action="" method="POST">
  <div class="container">
    <h1>Add Details</h1>

    <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM admin WHERE id=$id";
            $res= mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $admin_name = $row['admin_name'];
                }
                else
                {
                    header('location:' .SITEURL.'admin/admin.php');
                }
            }
        ?>
    <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Admin Name:</td>
                    <td>
                        <input type="text" name="admin_name" value="<?php echo $admin_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $admin_name = $_POST['admin_name'];
        $sql ="UPDATE admin SET
        admin_name ='$admin_name'
        WHERE id ='$id'
        ";
        $res =mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $_SESSION['update'] = "Admin Updated Successfully.";
            header('location:' .SITEURL.'admin/admin.php');
        }
        else
        {
            $_SESSION['update'] = "Failed To Delete Admin.";
            header('location:' .SITEURL.'admin/admin.php');
        }

    }
?>