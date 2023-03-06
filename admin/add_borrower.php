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
input[type=text], input[type=BorrowerName] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=BorrowerName]:focus {
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

    <label for="Borrower Name"><b>borrower Name</b></label>
    <input type="text" placeholder="Enter borrower Name" name="b_name" id="Borrower Name" required>


        <label for="Date Of Issue"><b>Date Of Issue</b></label>
    <input type="date" placeholder=" Enter Date Of Issue" name="date_of_issue" id="Date Of Issue" required>

    <label for="Date Of Return"><b>Date Of Return</b></label>
    <input type="Date" placeholder="Enter Date Of Return" name="date_of_return" id="Date Of Return" required>
    <hr>
    <button type="submit" name ="submit" class="updatebtn">Add Borrower</button>
  </div>
  
  
</form>

</body>
</html>
<?php  
    //Process the value from form and Save it in Database
    //Check whether the submitbutton is pressed 
    if(isset($_POST['submit']))
    {
         $b_name = $_POST['b_name'];
         $date_of_issue = $_POST['date_of_issue'];
         $date_of_return = $_POST['date_of_return'];
     

         $sql = "INSERT INTO borrower SET 
            b_name = '$b_name',
            date_of_issue = '$date_of_issue',
            date_of_return ='$date_of_return'
            ";

         
         $res = mysqli_query($conn, $sql) or die(mysqli_error());
         if($res==TRUE)
         {
             $_SESSION['add'] = "Borrwer Added Successfully";
             echo "<script>window.location.href='borrower.php'</script>";
         }
         else
         {
            $_SESSION['add'] = "Failed To Add Borrwer";
            echo "<script>window.location.href='borrower.php'</script>";
         }

    }
?>