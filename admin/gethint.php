<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// get the q parameter from URL
$q = $_REQUEST["q"];

//conect to database
$con = mysqli_connect('localhost','root','','s_v');
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// lookup all hints from array if $q is different from ""
if ($q !="") {
$result=mysqli_query($con,"SELECT * FROM logs WHERE stock_id='$q'");
$rowcount=mysqli_num_rows($result);
if($rowcount==0){
$ret=mysqli_query($con,"INSERT INTO `logs`(stock_id) VALUES ('$q')");
if($ret)
{
/*echo '<div class="alert alert-success"><strong>Success!</strong> employee successfully registered</div>'+date('l jS \of F Y h:i:s A');*/
echo '<script> alert("record entered successfully")</script>';
?>
<?php }
else
{

}
}else{
//echo 'record is already registered';  
echo '<div class="alert alert-success"><strong>Success!</strong> Record Added Successfully</div>';
?>
<?php
echo '<script> alert("record not entered")</script>';


  }

}
?>