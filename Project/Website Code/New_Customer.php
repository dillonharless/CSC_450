<?php //This page checks for required content, errors, and provides sticky output
	require 'includes/Header.php';
?>
<style>
.container{
/* set CSS styling */
	padding: 190px;
	padding-top: 20px;
}
.main {
	padding-top: 200px;
	padding-left: 200px;
	padding-bottom: 40px;
	background-color: #e6e6e6;
}
body {
	padding-top: 20px;
	padding-bottom: 40px;
	background-color: #e6e6e6;
}
.alert-success {
	padding-top: 200px;
  position: static;
  border: 3px solid #73AD21;
}

</style>

<?php
//collect and save user information to add to the database
	if (isset($_POST['send'])) {
	$missing = array();
	$errors = array();

	$firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($firstname))
		$missing[]='firstname';

	$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($lastname))
		$missing[]='lastname';

	$address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($address))
		$missing[]='address';

	$city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($city))
		$missing[]='city';

	$state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($state))
		$missing[]='state';

	$zipcode = trim(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($zipcode))
		$missing[]='zipcode';

	$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($phone))
		$missing[]='phone';

	$valid_email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));	//returns a string or null if empty or false if not valid
	if (trim($_POST['email']==''))
		$missing[] = 'email';
	elseif (!$valid_email)
		$errors[] = 'email';
	else
		$email = $valid_email;

	$password1 = trim(filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING));
	$password2 = trim(filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING));

	// Check for a password:
	if (empty($password1) || empty($password2))
		$missing[]='password';
	elseif ($password1 !== $password2)
			$errors[] = 'password';
	else $password = $password1;

	$accepted = filter_input(INPUT_POST, 'terms');
	if (empty($accepted) || $accepted !='accepted')
		$missing[] = 'accepted';





	if (!$missing && !$errors) {
		require_once ('../pdo_configuration.php'); // Connect to the db.
		$folder = preg_replace("/[^a-zA-Z0-9]/", "", $email);
		$folder = strtolower($folder);
		$sql = "INSERT into Reg_User (firstName, lastName, emailAddr, pw, folder) VALUES (:fname, :lname, :email, :pw, :folder); INSERT into OurCustomers1 (CEMAIL, ADDRESS, CNAME, PHONE) VALUES (:email, :address, :fname, :phone)";

		$pw =
	$stmt= $conn->prepare($sql);
	$stmt->bindValue(':fname', $firstname);
	$stmt->bindValue(':lname', $lastname);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':pw', password_hash($password1, PASSWORD_DEFAULT));
	$stmt->bindValue(':folder', $folder);

	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':address', $address);
	$stmt->bindValue(':fname', $firstname);
	$stmt->bindValue(':phone', $phone);

	$success = $stmt->execute();
	$errorInfo = $stmt->errorInfo();
	if (isset($errorInfo[2]))
		echo $errorInfo[2];
	else

		echo '<div class="alert alert-success" role="alert"><main><h2>Completed...! </h2><h3>The new account has been succesfully created</h3></main></div>';


	include 'includes/Footer.php';
	exit;
	}
}?>

<!-- creating the html form and filler info -->
	<div class = "container">

        <h2>Create Account:</h2>
        <form method="post" action="">
			<fieldset>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
                <label for="fn" class= "sr-only">First Name:
				<?php if ($missing && in_array('firstname', $missing)) { ?>
                        <span class="warning">Please enter your first name</span>
                    <?php } ?> </label>
                <input name="firstname" class= "form-control" placeholder="First Name"  id="fn" type="text"
				 <?php if (isset($firstname)) {
                    echo 'value="' . htmlspecialchars($firstname) . '"';
                } ?>
            </p>
			<p>
                <label for="ln" class= "sr-only">Last Name:
				<?php if ($missing && in_array('lastname', $missing)) { ?>
                        <span class="warning">Please enter your last name</span>
                    <?php } ?> </label>
                <input name="lastname" class= "form-control" placeholder="Last Name" id="ln" type="text"
				 <?php if (isset($lastname)) {
                    echo 'value="' . htmlspecialchars($lastname) . '"';
                } ?>
            </p>

            <p>
            	<label for="ln" class= "sr-only">Address:
            	<?php if ($missing && in_array('address', $missing)) { ?>
            			<span class="warning">Please enter your Address</span>
            		<?php } ?> </label>
            	<input name="address" class= "form-control" placeholder="Address" id="ln" type="text"
            	<?php if (isset($address)) {
            		echo 'value="' . htmlspecialchars($address) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln" class= "sr-only">City:
            	<?php if ($missing && in_array('city', $missing)) { ?>
            			<span class="warning">Please enter your City</span>
            		<?php } ?> </label>
            	<input name="city"  class= "form-control" placeholder="City" id="ln" type="text"
            	<?php if (isset($city)) {
            		echo 'value="' . htmlspecialchars($city) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln" class= "sr-only">State:
            	<?php if ($missing && in_array('state', $missing)) { ?>
            			<span class="warning">Please enter your State</span>
            		<?php } ?> </label>
            	<input name="state" class= "form-control" placeholder="State" id="ln" type="text"
            	<?php if (isset($state)) {
            		echo 'value="' . htmlspecialchars($state) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln" class= "sr-only">Zipcode:
            	<?php if ($missing && in_array('zipcode', $missing)) { ?>
            			<span class="warning">Please enter your Zipcode</span>
            		<?php } ?> </label>
            	<input name="zipcode" class= "form-control" placeholder="Zipcode" id="ln" type="text"
            	<?php if (isset($zipcode)) {
            		echo 'value="' . htmlspecialchars($zipcode) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln" class= "sr-only">Phone:
            	<?php if ($missing && in_array('phone', $missing)) { ?>
            			<span class="warning">Please enter your Phone number</span>
            		<?php } ?> </label>
            	<input name="phone" class= "form-control" placeholder="Phone"  id="ln" type="text"
            	<?php if (isset($phone)) {
            		echo 'value="' . htmlspecialchars($phone) . '"';
            	} ?>
            </p>


            <p>
                <label for="email" class= "sr-only">Email:
				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not valid</span>
                    <?php } ?>
				</label>
                <input name="email" class= "form-control" placeholder="Email address" id="email" type="text"
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>>

			<p>
				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The entered passwords do not match. Please try again.</span>
                    <?php } ?> </label>
                <label for="pw1" class= "sr-only">Password:

				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input name="password1" class= "form-control" placeholder="Password" id="pw1" type="password">
            </p>
			<p>
                <label for="pw2" class= "sr-only">Confirm Password:
				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please confirm the password</span>
                    <?php } ?> </label>
                <input name="password2" class= "form-control" placeholder="Confirm Password" id="pw2" type="password">
            </p>

            <p>
			<?php if ($missing && in_array('accepted', $missing)) { ?>
                        <span class="warning">You must agree to the terms</span><br>
                    <?php } ?>
                <input type="checkbox" name="terms" class= "form-control" value="accepted" id="terms"
				     <?php if ($accepted) {
                                echo 'checked';
                            } ?>
				>
                <label for="terms">I accept the terms of using this website</label>
            </p>
            <p>
                <input name="send" type="submit" class="btn btn-primary" value="Register">
            </p>
		</fieldset>
        </form>
</div>
<?php include './includes/Footer.php'; ?>
