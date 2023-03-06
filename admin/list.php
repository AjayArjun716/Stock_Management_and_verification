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
 .btn btn-primary pull-right{
  position: absolute;
 top:11%;
 right:15%
 }

</style>
</head>
<body>

<h2>LIST OF STOCKS</h2><br>
<h3><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></h3>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <a href="listpdf.php" class="btn1 btn btn-primary pull-right"><span class="glyphicon glyphicon-export"></span> Export As PDF</a>
<table>
  <tr>
    <th>Stock id</th>
    <th>Stock Name</th>
    <th>Count</th>
    <th>Availability</th>
  </tr>
  <tr>
<?php
                        $sql = "SELECT * FROM categories INNER JOIN logs ON categories.stock_id=logs.stock_id";
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
 <script>
    function toPDF () {
      html2pdf()
        .from(document.body)
        .save();
    }
    </script>

</body>
</html>
