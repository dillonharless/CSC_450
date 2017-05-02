<?php

//The account gets the information based on the session email.
//It will display the customer Account information
//start the session in order to be able to see the email.
session_start();
//call to the pdo configuration which has the dataBase credentials
	include '../pdo_configuration.php';
//if the email is set in the session store it in $email variable
	if(isset($_SESSION['email'])) {
	    $email = $_SESSION['email'];
	  }
//This query will get all the information from the OurCustomers1 table. where the email matches the session email.
	$sql = ("SELECT * FROM OurCustomers1 WHERE CEMAIL= '$email'");
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();

require 'includes/Header.php';
?>
// defining the html page
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
//this table will display the info stored from the database
<br><table width = "70%" cellpadding = "5" cellspace= "5" class="table">

<tr>

		<td><strong>Email address:</strong></td>
		<td><strong>Name:</strong></td>
		<td><strong>Address:</strong></td>
		<td><strong>Phone:</strong></td>
		</tr>

		</div>
//PHP for pulling the data for the table
<?php foreach($conn->query($sql) as $row) { ?>
		<tr>
			<td><?php echo $row['CEMAIL']; ?></td>
			<td><?php echo $row['CNAME']; ?></td>
			<td><?php echo $row['ADDRESS']; ?></td>
			<td><?php echo $row['PHONE']; ?></td>
	</tr>

<?php } ?>
	</table>
	<div class="col-md-6">
			<a class="btn btn-primary" href="New_Customer.php?action=edit&id=<?php echo $row["id"]; ?>">edit-information</a>
	</div>
	</body>
</html>
<?php include './includes/Footer.php'; ?>
