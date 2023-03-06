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

<form action="" method="POST" >
  <div class="container">
    <h1>Add Details</h1>
    <hr>
    <label for="Stock Id"><b>Stock ID</b></label>
    <input type="text" placeholder="Enter ID" name="stock_id" id="stock_id" required><br>

    <label for="Stock Name"><b>Stock Name</b></label>
    <input type="text" placeholder="Enter Stock Name" name="stock_name" id="Stock Name" required><br>

    <label for="Count"><b>Count</b></label>
    <input type="text" placeholder="Count" name="count_of_stocks" id="Count" required><br>

    <label for="Availability"><b>Availability</b></label>
    <input type="text" placeholder="Enter Availability" name="availability" id="Availability" required><br>


    <hr>
    <button type="submit" name="submit" class="updatebtn">Submit</button>
  </div>
  
  
</form>

</body>
</html>
<?php  
    //Process the value from form and Save it in Database
    //Check whether the submitbutton is pressed 
    if(isset($_POST['submit']))
    {
         $stock_id = $_POST['stock_id'];
         $stock_name = $_POST['stock_name'];
         $count_of_stocks = $_POST['count_of_stocks'];
         $availability = ($_POST['availability']);

         $sql = "INSERT INTO categories SET
            stock_id = '$stock_id',
            stock_name = '$stock_name',
            count_of_stocks = '$count_of_stocks',
            availability = '$availability'
         ";
         

         $res = mysqli_query($conn, $sql) or die(mysqli_error());
         if($res==TRUE)
         {
             $_SESSION['add'] = "Stock Added Successfully";
             echo "<script>window.location.href='categories.php'</script>";
         }
         else
         {
            $_SESSION['add'] = "Failed To Add Stock";
            echo "<script>window.location.href='categories.php'</script>";
         }

    }
?>