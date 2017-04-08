<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>

<nav class="navbar navbar-light" style="background-color:#E15B5B" style="font-color:#E15B5B">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
      <a class="navbar-brand" href="#">
  <img src="images/Logo.png" width="150" height="120" class="d-inline-block align-top" alt="">
  Kyle's Art Gallery
</a>
			<!-- <a class="navbar-brand" href="Index.php">&copy; <b>Kyle Art Gallery</b></a> -->
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Index.php" <?php if ($currentPage == 'Index.php') {echo 'id="here"'; } ?>>Home</a></li>
				<li><a href="Shop_Index.php" <?php if ($currentPage == 'Shop_Index.php') {echo 'id="here"'; } ?>>Shop</a></li>
				<li><a href="Create_Acct.php" <?php if($currentPage== 'Create_Acct.php') {echo 'id="here"';} ?>>Register</a></li>
				<?php
							if(isset($_SESSION['email'])){ ?>
				<li><a href="Logged_Out.php" >Logout</a></li>
				<?php }else {?>
					<li><a href="Login.php" <?php if($currentPage== 'Login.php') {echo 'id="here"';} ?>>Login</a></li>
				<?php
			}
					?>

			</ul>
			<form action= "Search.php" method ="post" class="navbar-form navbar-right" >
				<input type="text" name="search_string" class="form-control" placeholder="Search...">
        <input type="Submit" class="form-control" name = "search" value ="search"/>
			</form>
		</div>
	</div>
</nav>
<?php
			if(isset($_SESSION['email'])){ ?>

	<div class="wrapper">
    <div class="sidebar-wrapper">
			<ul class="nav nav-sidebar">
				<li class="active"><a href="Search.php"<?php if($currentPage== 'Search.php') {echo 'id="here"';} ?>>Search <span class="sr-only">(current)</span></a></li>
				<li><a href="Employee.php"<?php if($currentPage== 'Employee.php') {echo 'id="here"';} ?>>Employees</a></li>
				<li><a href="Customer.php"<?php if($currentPage== 'Customer.php') {echo 'id="here"';} ?>>Customers</a></li>
				<li><a href="View_Orders.php"<?php if($currentPage== 'View_Orders.php') {echo 'id="here"';} ?>>View Orders</a></li>

				<li><a href="Add_Emp.php" <?php if($currentPage== 'Add_Emp.php') {echo 'id="here"';} ?>>New Employee</a></li>
        <li><a href="Remove_Employee.php" <?php if($currentPage== 'Remove_Employee.php') {echo 'id="here"';} ?>>Remove Employees</a></li>
				<li><a href="Upload_Images.php" <?php if($currentPage== 'Upload_Images.php') {echo 'id="here"';} ?>>Upload Images</a></li>
				<li><a href="View_Images.php" <?php if($currentPage== 'View_Images.php') {echo 'id="here"';} ?>>View Images</a></li>


				<?php }?>
			</ul>
		</div>
  </div>
