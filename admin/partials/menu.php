<?php include('../constants/db.php'); 
      include('login_check.php');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Categories </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="borrower.php">Borrower</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Help</a>
        </li>
      </ul>
      <form class="d-flex" method="POST" action="category_search.php">
         <div class="container-fluid">
    <a class="navbar-brand" href="logout.php">
      <img src="../images/logo1.jpeg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"  > 
    </a>
  </div>
            <input type="search" name="search" placeholder="Search for Stock..." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
  </div>
</nav>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
</body>