
<!-- If someone is logged in, this stores all the orders someone has placed in a variable called $result -->
<?php
 if(isset($_SESSION['email'])){
		$setEmail = $_SESSION['email'];
		

	// $search = preg_replace("#[^0-9a-z]#i","",$searchq);
	require_once('../pdo_configuration.php');
	$sql = 'SELECT * FROM ordersNew natural join orders1 where c_email ='. $setEmail .';';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();

require 'includes/Header.php';
?>

<!DOCTYPE html>
<style>
.container{

	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 200px;
}

</style>
<body>

<div class="container">

<br><table width = "70%" cellpadding = "5" cellspace= "5" class="table">

<tr>

		<td><strong>ID</strong></td>
		<td><strong>Total</strong></td>
		<td><strong>Created</strong></td>
		<td><strong>Modified</strong></td>


</tr>
</div>

<!-- This echos to the page every element in each tuple that represents an order for a specific customer -->
<?php 	foreach($conn->query($sql) as $row) { ?>
			<tr>
				<td><?php echo $row['p_id']; ?></td>
<!-- 				<td><?php echo $row['c_email']; ?></td> -->
<!-- 				<td><?php echo $row['customer_id']; ?></td> -->
				<td><?php echo $row['total_price']; ?></td>
 				<td><?php echo $row['qty']; ?></td> 
							

			

			</tr>

<?php } ?>



	</table>
	</body>
</html>
<?php include './includes/Footer.php'; ?>
