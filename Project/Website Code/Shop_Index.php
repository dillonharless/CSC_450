<?php
// include database configuration file
include '../dbConfig.php';
//includes the header which includes the menu
require 'includes/Header.php';
?>
<head>
    <!-- reference to the bootstrap -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 185px; padding-top: 25px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}

    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Gallery:</h1>
    <a href="View_Cart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM products1 ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        ?>
        <div class="col-md-4">
            <div class="thumbnail">
                <div class="caption">
  <!-- sources the image basaed on the name of the item -->
                <h4><td><img src = "images/<?php echo $row["name"];?>" width="150" height = "80" class="img-responsive center-block" alt="equipment"></h4>
                    <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo '$'.$row["price"].' USD'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="CartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="Images_Details.php?action=View Detail&id=<?php echo $row["id"]; ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>

    </div>
</div>
</body>
  <?php include './includes/Footer.php'; ?>
