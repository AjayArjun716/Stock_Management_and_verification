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
.action{ 
position: absolute;
top:11%;
right:17%
 }
 .btn1{ 
position: absolute;
top:11%;
right:15%
 }

</style>
</head>
<body>

<h2>CATEGORIES</h2>
<?php
            if(isset($_SESSION['update']))
                 {
                       echo $_SESSION['update'];
                       unset($_SESSION['update']);
                   }
                 if(isset($_SESSION['add']))
                 {
                       echo $_SESSION['add'];
                       unset($_SESSION['add']);
                 }
                 if(isset($_SESSION['delete']))
                 {
                       echo $_SESSION['delete'];
                       unset($_SESSION['delete']);
                   }
?>
<h3><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></h3>
    <button class="btn1"><a class="fa fa-plus" href="add_categories.php"></a></button>

<h4><a class="action">ADD STOCK:</h4> </a> 
<table>
  <tr>
    <th>Stock id</th>
    <th>Stock Name</th>
    <th>Count</th>
    <th>Availability</th>
     <th>Action</th>
     <th>QR Code</th>
    
  </tr>
  <tr>
<?php
                        $sql = "SELECT * FROM categories";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE)
                        {
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                          $stock_id = $rows['stock_id'];
                                          $stock_name = $rows['stock_name'];
                                          $count_of_stocks=$rows['count_of_stocks'];
                                           $availability=$rows['availability'];
                                          ?>
                                          <tr>
                                                <td><?php echo $stock_id; ?></td>
                                                <td><?php echo $stock_name; ?></td>
                                                <td><?php echo $count_of_stocks; ?></td>
                                                <td><?php echo $availability; ?></td>
                                                <td>
                                                      <a href="<?php echo SITEURL; ?>admin/update_categories.php?stock_id=<?php echo $stock_id; ?>&stock_name=<?php echo $stock_name; ?>&count_of_stocks=<?php echo $count_of_stocks; ?>&availability=<?php echo $availability; ?>" button class="btn btn-info">Update Category</button></a>
                                                      <a href="<?php echo SITEURL; ?>admin/delete_categories.php?stock_id=<?php echo $stock_id; ?>" button class="btn btn-danger">Delete Category</a></button></a>
                                 
                                                </td>
                                                <td>  
                                                    <form class="d-flex">
                                                    <div class="container-fluid">
                                                    <a class="navbar-brand" href="<?php echo SITEURL; ?>qrcode/qrcode_generator.php?id=<?php echo $stock_id;?>">
                                                    <img src="../images/qrcode.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill" ></a>
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
  
   
</table>

</body>
</html>
