<?php
// initialize shopping cart class
date_default_timezone_set('America/New_York');
include 'Cart.php';
$cart = new Cart;

//This page will get the information from the product and then will populate the tables orders1, and order_items1 with the Cart information
//Also the information sotred in the session will be saved in the tables.
//connects to the database with the dbConfig file which includes credentials of the db.
include '../dbConfig.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM products1 WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );

        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'View_Cart.php':'Shop_Index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: View_Cart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['email'])){
        // insert order details into database
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
          }
        //insert the order into dataBase
        $insertOrder = $db->query("INSERT INTO orders1 (customer_id, c_email, total_price, created) VALUES ('".$_SESSION['sessCustomerID']."','".$email."', '".$cart->total()."', '".date("Y-m-d H:i:s")."')");

        if($insertOrder){
            $orderID = rand();
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items1 (ORDER_ID, CEMAIL, P_NO, QTY) VALUES ('".$orderID."', '".$email."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);

            if($insertOrderItems){
                $cart->destroy();
                header("Location: Success.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: Shop_Index.php");
    }
}else{
    header("Location: Shop_Index.php");
}
