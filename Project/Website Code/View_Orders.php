<?php
//start session to get the info of the current user
session_start();
	include '../pdo_configuration.php';
	// if there is a session store the email in the variable
	if(isset($_SESSION['email'])) {
	    $email = $_SESSION['email'];
	  }
		//This query joins two tables in order to get a complete resume of the orders placed.
	$sql = ("SELECT distinct * FROM orders1 natural join order_items1 WHERE c_email= '$email'");
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount(); //Fetch the array with the information coming from the sql statement.

require 'includes/Header.php';
?>
<!-- Display the infomation of previous orders in the following html table  -->
<!DOCTYPE html>
<style>
/* setting CSS for the page */
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
	<!-- set order information in bold -->
		<td><strong>Order ID</strong></td>
		<td><strong>Total</strong></td>
		<td><strong>Created</strong></td>
		<td><strong>Product</strong></td>
		<td><strong>QTY</strong></td>
		</tr>
		</div>

<?php foreach($conn->query($sql) as $row) { ?>
		<tr>
		<!-- insert information from the DB -->
			<td><?php echo $row['ORDER_ID']; ?></td>
			<td><?php echo $row['total_price']; ?></td>
			<td><?php echo $row['created']; ?></td>
			<td><?php echo $row['P_NO']; ?></td>
			<td><?php echo $row['QTY']; ?></td>
		</tr>

<?php } ?>
	</table>
	</body>
</html>
<?php include './includes/Footer.php'; ?>
