<?php include('partials/menu.php') ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}



td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
  background-color: #dddddd;
}
.btn1{ 
position: absolute;
top:8%;
right:13%
 }
.action{ 
position: absolute;
top:8%;
right:17%
 }

</style>
</head>
<body>
<h2>ADMIN</h2>
<?php
                 if(isset($_SESSION['add']))
                 {
                       echo $_SESSION['add'];
                       unset($_SESSION['add']);
                 }
                 if(isset($_SESSION['update']))
                 {
                       echo $_SESSION['update'];
                       unset($_SESSION['update']);
                 }
                 if(isset($_SESSION['pwd-not-match']))
                 {
                       echo $_SESSION['pwd-not-match'];
                       unset($_SESSION['pwd-not-match']);
                 }
                 if(isset($_SESSION['change-pwd']))
                 {
                       echo $_SESSION['change-pwd'];
                       unset($_SESSION['change-pwd']);
                 }
                  if(isset($_SESSION['user-not-found']))
                 {
                       echo $_SESSION['user-not-found'];
                       unset($_SESSION['user-not-found']);
                 }

?>
<h3><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></h3>
    <button class="btn1"><a class="fa fa-pencil" href="<?php echo SITEURL;?>admin/add_admin.php"></a></button>
    

<h4><a class="action">ADD ADMIN:</h4> </a>   

<table>
  <tr>
    <th>Admin ID</th>
    <th>Admin Name</th>
    <th>Password</th>
    <th>Actions</th>

    
  </tr>
  <?php
                        $sql = "SELECT * FROM admin";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE)
                        {
                              $count = mysqli_num_rows($res);
                              $sn=1;
                              if($count>0)
                              {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                          $id = $rows['id'];
                                          $admin_name = $rows['admin_name'];
                                          $password=$rows['password'];
                                          ?>
                                          <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $admin_name; ?></td>
                                                <td><?php echo $password; ?></td>
                                                <td>
            <a href="<?php echo SITEURL; ?>admin/update_password.php?id=<?php echo $id; ?>" class="btn btn-warning">Change Password</a>
                                                      <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn btn-info">Update admin</a>
                                                      <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn btn-danger">delete admin</a>
                                 
                                                </td>
                                          </tr>
                                          <?php 

                                    }
                              }
                              else
                              {

                              }
                        }
                        ?>
</body>
</html>   