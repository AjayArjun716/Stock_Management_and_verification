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

<form action="add_stock.php" >
  <div class="container">
    <h1>Add Details</h1>
    <hr>

    <label for="Stock Name"><b>Stock Name</b></label>
    <input type="text" placeholder="Enter Stock Name" name="Stock Name" id="Stock Name" required>

    <label for="Availability"><b>Availability</b></label>
    <input type="text" placeholder="Enter Availability" name="Availability" id="Availability" required>

    <label for="Count"><b>Count</b></label>
    <input type="number" placeholder="Count" name="Count" id="Count" required>
    <hr>
    <button type="update" class="updatebtn">Update</button>
  </div>
  
  
</form>

</body>
</html>
