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
top:5%;
right:7%
 }
.btn2{ 
position: absolute;
top:8%;
right:5%
 }
.action{ 
position: absolute;
top:8%;
right:9%
 }

</style>
</head>
<body>
<h2>BORROWERS</h2>
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
?>
<h3><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></h3>
    <button class="btn2"><a class="fa fa-plus" href="add_borrower.php"></a></button></td>
<h4><a class="action">ACTION:</h4> </a> 

 
<table>
  <tr>
    <th>Borrower ID</th>
    <th>Borrower Namw</th>
    <th>Date of issue</th>
    <th>Date of return</th>
    <th> Action</th>


                        <?php
                        $sql = "SELECT * FROM borrower";
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
                                          $b_name = $rows['b_name'];
                                          $date_of_issue = $rows['date_of_issue'];
                                          $date_of_return=$rows['date_of_return'];
                                          ?>
                                          <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $b_name; ?></td>
                                                <td><?php echo $date_of_issue; ?></td>
                                                <td><?php echo $date_of_return; ?></td>
                                                <td>
                                                      <a href="<?php echo SITEURL; ?>admin/update_borrower.php?id=<?php echo $id; ?>" class="btn btn-info">Update borrower</a>
                                                      <a href="<?php echo SITEURL; ?>admin/delete_borrower.php?id=<?php echo $id; ?>" class="btn btn-danger">delete borrower</a>
                                 
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
    
  </tr>
</table>

</body>
</html>