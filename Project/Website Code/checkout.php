<?php
session_start();
// include database configuration file
include '../dbConfig.php';
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
  }
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: Shop_Index.php");
}


// // set customer ID in session
// $_SESSION['sessCustomerID'] = $custRow['C_ID'];


// get customer details by session customer EMAIL Address
$query = $db->query("SELECT * FROM OurCustomers1 WHERE CEMAIL = '$email'");
$custRow = $query->fetch_assoc();

// set customer ID in session
$_SESSION['sessCustomerID'] = $custRow['C_ID'];
//includes the header which includes menu and styling
require 'includes/Header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- link in external scripts and stylesheets for the page -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{width: 90%;padding: 150px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left; padding: 100px;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
  <!--gives a preview of the order -->
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <!--push the cart items from the session if there is no items in the cart then cart shows empty -->
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
          <!--will display the information from the cart -->
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
        </tr>
        <?php } }else{ ?>
          <!-- if no items the display message -->
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <!--display the shipping details for the user -->
    <div class="shipAddr">
        <h4>Shipping Details</h4>
        <p><?php echo $custRow['CNAME']; ?></p>
        <p><?php echo $custRow['CEMAIL']; ?></p>
        <p><?php echo $custRow['PHONE']; ?></p>
        <p><?php echo $custRow['ADDRESS']; ?></p>
    </div>
    <div class="footBtn">
        <a href="Shop_Index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
        <a href="checkout.php" class="btn btn-danger"><i></i> Empty Cart</a>
        <a href="CartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>
</body>
</html>
<?php include './includes/Footer.php'; ?>
