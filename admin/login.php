<?php include("../constants/db.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Stock Verification management</title>
    <style >
    .text-center{
         text-align: center;
        }
    .btn-primary{
    background-color: #1e90ff;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.login{
    border: 1px solid gray;
    width: 20%;
    margin: 10% auto;
    padding: 2%;
}
.sucess{
    color: #2ed573;
}
.error{
    color: #ff4757;
}
    </style>
</head>
<body>
    <div class="login">
        <h1 class = "text-center">Login</h1><br><br>
          <?php 
           if(isset($_SESSION['login']))
           {
               echo $_SESSION['login'];
               unset ($_SESSION['login']);
           }
           if(isset($_SESSION['no-login-message']))
           {
              echo $_SESSION['no-login-message'];
              unset($_SESSION['no-login-message']);
           }
            ?>
            <br><br>
                <form action="" method="post" class="text-center">
                    Admin name: <br>
                    <input type="text" name="admin_name" placeholder="Enter Admin name"> <br><br>
                    Password: <br>
                    <input type="password" name = "password" placeholder="Enter Password">
                    <br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                    <br><br>


                </form>



        <p class = "text-center" >Created by <a href="#"> Arjun</a></p>
    </div>
    
</body>
</html>
<?php 
 if(isset($_POST['submit'])){
     $admin_name = $_POST['admin_name'];
     $password = $_POST['password'];

     $sql="SELECT * FROM admin WHERE admin_name = '$admin_name' AND password = '$password'";

     $res = mysqli_query($conn, $sql);


     $count = mysqli_num_rows($res);

     if($count == 1)
     {
        $_SESSION['login'] = "<div class = 'sucess'>Login Successful </div>";
        $_SESSION['user'] = $admin_name;
        header('location:'.SITEURL.'admin/');

     }
     else{
        $_SESSION['login'] = "<div class = 'error' text = 'center'>Username or Password did not Match </div>";
        header('location:'.SITEURL.'admin/login.php');

     }

     
 }

?>
