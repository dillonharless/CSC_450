<?php

if(isset($_POST['search'])) {

	$search = $_POST['search_string'];

	// $search = preg_replace("#[^0-9a-z]#i","",$searchq);
	require_once ('../pdo_config.php');
	$sql = "SELECT * from employee where e_id = :search";
	$statement = $conn->prepare($sql);
	$statement->bindValue(":search", $search);
	$statement->execute();
	$numRows = $statement->rowCount();
	$result = $statement->fetch();
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2])){
		$error = $errorInfo[2];
		echo $error;
		}
}
require 'includes/Ca_Header.php';
?>
<style>


.container{padding: 25px 50px 75px 250px;


}
</style>




<div class= "container">
<body>

<form action="Ca_Search.php" method = "post">

	<input type="text" name= "search_string" placeholder= "Search for E_ID"/>
	<input type ="submit" name= "search" value= "search" />

		<select name= "typeSearch" id="typeSearch">
			<option value"">Select one</option>
			<option value= "employees">Employees</option>
			<option value= "customers">Customers</option>
			<option value= "quotes">Quotes</option>


		</select>


</form>



<table class= "table" width = "70%" cellpadding = "5" cellspace= "5">

<tr>

		<td><strong>ID</strong></td>
		<td><strong>First Name</strong></td>
		<td><strong>Last Name</strong></td>
		<td><strong>Address</strong></td>
		<td><strong>City</strong></td>
		<td><strong>State</strong></td>
		<td><strong>Zip</strong></td>
		<td><strong>Phone</strong></td>



		</tr>
		</div>



<?php if(isset($result)) {	?>
<tr>
			<td> <?php echo $result['e_id']; ?></td>
			<td> <?php echo $result['fname']; ?></td>
				<td> <?php echo $result['lname']; ?></td>
					<td> <?php echo $result['address']; ?></td>
						<td> <?php echo $result['city']; ?></td>
							<td> <?php echo $result['state']; ?></td>
								<td> <?php echo $result['zip']; ?></td>
									<td> <?php echo $result['phone']; ?></td>


</tr>
			<?php } ?>

</table>
</body>
<?php include './includes/Ca_Footer.php'; ?>
