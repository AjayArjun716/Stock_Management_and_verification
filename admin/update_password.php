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
input[type=text], input[type=Password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=Password]:focus {
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
<div class="main content">
    <div class="wrapper">
        <h1> Change Password</h1>
        <br><br>
        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>
    <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td> Current Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Old Password">
                    </td>
                </tr>
                <tr>
                    <td> New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td> Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name='id' value="<?php echo $id; ?>" >
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>
</form>
</body>
</html>
  <?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $current_password = ($_POST['current_password']);
        $new_password = ($_POST['new_password']);
        $confirm_password = ($_POST['confirm_password']);
        $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";
        $res =mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                if($new_password==$confirm_password)
                {
                    $sql2 = "UPDATE admin SET
                    password='$new_password'
                    WHERE id = $id";
                    $res2 = mysqli_query($conn, $sql2);
                    
                        if($res2==TRUE)
                        {
                            $_SESSION['change-pwd'] = "Changed Password Successfully.";
                            echo "<script>window.location.href='admin.php'</script>";
                            
                        }
                        else
                        {
                            $_SESSION['change-pwd'] = "Failed To Changed Password.";
                            echo "<script>window.location.href='admin.php'</script>";
                        }
                     }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "Password Did Not Match.";
                            echo "<script>window.location.href='admin.php'</script>";                     }
                        }
                       else
                       {
                           echo "<script>window.location.href='admin.php'</script>";
                     }
                  }
               }
        ?>
  
  

