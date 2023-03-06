<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;



$document = new Dompdf();


$output = "
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
	</head>
<body>
<table width='100%' border='0.1'>
	<thead class='alert-info'>
		<tr>
			<th>Stock ID  </th>
			<th>Stock Name   </th>
			<th>Count  </th>
			<th>Availability   </th>
		</tr>
	</thead>
";

require_once 'conn.php';

$query = $conn->query("SELECT * FROM categories INNER JOIN logs ON categories.stock_id=logs.stock_id") or die($conn->error());

while($fetch = $query->fetch_array()){
	
$output .= '
	<tbody style="background-color:#fff;">	
		<tr>
			<td>'.$fetch['stock_id'].'</td>
			<td>'.$fetch['stock_name'].'</td>
			<td>'.$fetch['count_of_stocks'].'</td>
			<td>'.$fetch['availability'].'</td>
		</tr>
	</tbody>
';

}


$output .= '</table></body></html>';

$document->loadHtml($output);

$document->setPaper('A4', 'landscape');

$document->render();

$document->stream("Stock_Verification", array("Attachment"=>0));

?>
