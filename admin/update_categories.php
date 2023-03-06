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
    <h1>update Details</h1>
    <?php
    if(isset($_GET['stock_id']))
            {
            $s_id=$_GET['stock_id'];
            $s_name=$_GET['stock_name'];
            $c_of_stocks = $_GET['count_of_stocks'];
            $available=$_GET['availability'];
        }
        ?>
    <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>
                        <input type="hidden" name="stock_id" value="<?php echo $s_id; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Stock Name:</td>
                    <td>
                        <input type="text" name="stock_name" value="<?php echo $s_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Count:</td>
                    <td>
                        <input type="number" name="count_of_stocks" value="<?php echo $c_of_stocks; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Availability:</td>
                    <td>
                        <input type="text" name="availability" value="<?php echo $available; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $stock_id; ?>" >
                        <input type="submit" name="submit" value="Update Stock" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $stock_id = $_POST['stock_id'];
        $stock_name = $_POST['stock_name'];
        $count_of_stocks=$_POST['count_of_stocks'];
        $availability=$_POST['availability'];
        $sql= "UPDATE `categories` SET `stock_id`='$stock_id',`stock_name`=' $stock_name',`count_of_stocks`='$count_of_stocks',`availability`='$availability' WHERE stock_id = '$stock_id'";

        $res =mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $_SESSION['update'] = "Stock Updated Successfully.";
            echo "<script>window.location.href='categories.php'</script>";
        }
        else
        {
            $_SESSION['update'] = "Failed To update Stock.";
            echo "<script>window.location.href='update_categories.php'</script>";
        }

    }
?>