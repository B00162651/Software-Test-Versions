<?php

session_start();

// necessary classes
require_once __DIR__ . '/cart.php';  
require_once __DIR__ . '/shoe.php';  


class CartRemoveItemTest {
    public static function runTest() {
        // empty cart
        $_SESSION['cart'] = [];

        // create a cart object
        $cart = new Cart();

        // new shoe objects
        $shoe1 = new Shoe();
        $shoe1->setId(1);
        $shoe1->setName('Airforce 1');
        $shoe1->setPrice(100);
        $shoe1->setDescription('Cool running shoe');
        $shoe1->setImagePath('/images/nike-air.png');

        $shoe2 = new Shoe();
        $shoe2->setId(2);
        $shoe2->setName('Asics');
        $shoe2->setPrice(150);
        $shoe2->setDescription('Comfy running shoe');
        $shoe2->setImagePath('/images/adidas-boost.png');

        // add shoes to the cart
        $cart->addItem($shoe1); 
        $cart->addItem($shoe2); 
        $cart->addItem($shoe1); 

        // see cart before we remove 
        echo "<h1>Cart Removal</h1>";
        echo "<h3>Before Remove:</h3>";
        echo "Cart contains: <br>";
        foreach ($_SESSION['cart'] as $item) {
            echo $item['name'] . " - Quantity: " . $item['quantity'] . "<br>";
        }

        echo "<h3>Removing Item:</h3>";
        // show the removed item
        $removedItem = $_SESSION['cart'][1]; 
         // remove nike air ID 1
        $cart->removeItem(1); 
        echo "Removed Item: " . $removedItem['name'] . "<br><br>";

        // remove Nike from the cart id 1
        $cart->removeItem(1); 

        // check the cart again after removal
        echo "<h3>After Remove:</h3>";
        echo "Cart contains: <br>";
        foreach ($_SESSION['cart'] as $item) {
            echo $item['name'] . " - Quantity: " . $item['quantity'] . "<br>";
        }
    }
}

// run the test
CartRemoveItemTest::runTest();
?>