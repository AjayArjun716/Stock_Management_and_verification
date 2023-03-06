<?php include('partials/menu.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .position{
      position: absolute;
      top:7% ;
      left: 65%;
          }
   body {
   margin: 0;
   font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color:#f1f1f1;
  position: absolute;
  top: 8.3%;
  height: 151%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  color: Black;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }


  </style>
  <title>Admin Page</title>
  <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
</head>

<body>

<div class="sidebar">
  <a class="active" href="#">RAIL</a>
  <a href="admin.php">Admin</a>
  <a href="categories.php">Categories</a>
  <a href="borrower.php">Borrowers Details</a>
  <a href="scanner.php">Scanner</a>
  <a href="list.php">Stock List</a>
</div>

</body>
</html>


<body>
  <style type="text/css">
    .design{
      position: absolute;
      center: 0%;
      width:84.8%;
      right: 0%;
      top: 45%;
      max-height: 20%;
    }
    .text-center{
      text-align: center;
    }
    .col-4{
      width: 18%;
      background-color: white;
      margin: 1%;
      padding: 5px;
      top: -73px;
      left: 300px;
      position: relative;
      float: left;
    }
    .main-content{
      background-color: #f1f2f6;
      padding: 3% 0;

    }
    .wrapper{
      padding: 1%;
      width: 80%;
      margin: 0 auto;
    }
    .abc{
      position: relative;
      top: 20%;
    }

  </style>

<!-- Carousel -->
<div class="design">
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/as.jfif" alt="Los Angeles" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="../images/hifi.jpg" alt="Chicago" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="../images/yu.jpg" alt="New York" class="d-block" style="width:100%">
    </div>
  </div>

  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</div>
</body>
<body>
<div class="main-content">
            <div class="wrapper">
              <div class="abc text-center" >
                <h1>Dashboard</h1></div>
                <br><br>
                <div class="container ">


                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM categories";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Stocks
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM borrower";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Borrower
                </div>
</div>
                

            </div>
        </div>
</body>
</html>

</body>
</html>