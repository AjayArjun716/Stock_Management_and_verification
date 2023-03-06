<?php
     include('../admin/partials/menu.php');
     include('libs/phpqrcode/qrlib.php'); 

		 $id=$_GET['id'];
            $sql="SELECT * FROM categories WHERE id='$id'";
            $res= mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['id'];
                }
                else
                {
                    header('location:' .SITEURL.'admin/categories.php');
                }
            }	
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Quick Response (QR)</title>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
    </head>
	<body>
	
			<div class="input-field">
				<h3>Please Fill-out All Fields</h3>
				<form method="POST" action="" >
					<div class="form-group">
						<label>Stock ID</label>
		<input type="text" class="form-control" name="stock_id" style="width:20em;" value="<?php echo $id; ?>" required />
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-danger submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
			</div>
			<?php
   if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$filename = "Stock_Verification_".rand(000,999);
	$codeContents = $id;
   
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>
			<?php
			if(!isset($filename)){
				$filename = "stockid";
			}
			?>
			<div class="qr-field">
				<h2 style="text-align:center">QR Code Result: </h2>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-default submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>
			
	
	</body>

</html>