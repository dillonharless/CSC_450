<?php

	require 'includes/Header.php'; //The header wich includes the menu
	require_once '../pdo_configuration.php'; // Connect to the database.
	function shortTitle ($title){
		$title = substr($title, 0, -4);
		$title = str_replace('_', ' ', $title);
		$title = ucwords($title);
		return $title;} //returns the name of the image without any spaces or underscores.

				$imageID = filter_input(INPUT_POST, 'id');
				$getImage= "SELECT * FROM products1 WHERE id = :imgID"; //Gets everything from the dataBase where the id matches the imageID
				$stmt = $conn->prepare($getImage);
				$stmt->bindValue(':imgID', $imageID);
				$stmt->execute();
				$errorInfo = $conn->errorInfo();
				if (isset($errorInfo[2])) {
					$error = $errorInfo[2];
					echo $error;
					exit;
				} else {
					$row = $stmt->fetch(); //fetch the array with the values coming from table products1

?>
<!-- display the info -->
<main>
		<h2>Purchase <?php echo shortTitle($row['name']);?></h2>
		<form action = "Finish.php" method= "post" style = "display:inline;">
			<img src = "images/<?php echo $row['name'];?>" alt="product"><br><br>
			Description:<br><br>
			<?php echo $row['description'];?> <br><br>
			<?php echo $row['details'];?> <br><br>
			Price: $<?php echo $row['price']; ?>
			<input type= "hidden" name= "action" value="add">
			<input type= "hidden" name= "id" value="<?php echo $row['id']; ?>">
			<input type= "submit" value= "Add To Cart">


		</form>

<?php } //end else ?>
</main>
<?php include 'includes/Footer.php'; ?>
