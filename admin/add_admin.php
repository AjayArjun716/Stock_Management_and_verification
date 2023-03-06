<?php include('menu.php') ?>
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
    
    <hr>

    <label for="Admin Name"><b>Admin Name</b></label>
    <input type="text" placeholder="Change Admin Name" name="admin_name" id="Admin Name" required>

    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter New Password" name="password" id="Password" required>

    
    <hr>
    <button type="submit" name="submit" value="Add Admin" class="updatebtn">Submit</button>
  </div>
  
  
</form>

</body>
</html>

<?php  
    //Process the value from form and Save it in Database
    //Check whether the submitbutton is pressed 
    if(isset($_POST['submit']))
    {
         $admin_name = $_POST['admin_name'];
         $password = $_POST['password'];
         

         $sql = "INSERT INTO admin SET
            admin_name= '$admin_name',
            password = '$password'
           
         ";
         

         $res = mysqli_query($conn, $sql) or die(mysqli_error());
         if($res==TRUE)
         {
             $_SESSION['add'] = "<div class = 'sucess'>Admin Added Successfully</div>";
             header("location:".SITEURL.'admin/admin.php');
         }
         else
         {
            $_SESSION['add'] = "<div class = 'error'>Failed To Add Admin</div>";
            header("location:".SITEURL.'admin/edit_admin.php');
         }

    }
?>
