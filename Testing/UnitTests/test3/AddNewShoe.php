<?php
session_start();

// our classes 
require_once __DIR__ . '/cart.php';  
require_once __DIR__ . '/shoe.php'; 

// test
class CartAddItemTest {
    public static function runTest() {
        // reset it
        $_SESSION['cart'] = []; 

        //object 
        $cart = new Cart();

        // new shoe
        $shoe = new Shoe();
        $shoe->setId(1);
        $shoe->setName('Airforce 1');
        $shoe->setPrice(100);
        $shoe->setDescription('Cool running shoe');
        $shoe->setImagePath('images/AFS.jpg');

        // add shoe to cart
        $cart->addItem($shoe);
        
        $shoe = new Shoe();
        $shoe->setId(2);
        $shoe->setName('Asics');
        $shoe->setPrice(300);
        $shoe->setDescription('Cool running shoe');
        $shoe->setImagePath('images/asics.jpg');

        // add shoe to cart
        $cart->addItem($shoe);

        // print the data
        echo "<h1>Cart Add Item Test</h1>";

        // check if shoe was added
        if (isset($_SESSION['cart'][1])) {
            echo "Test Passed! The item was added to the cart.<br>";
            echo "Product ID: " . $_SESSION['cart'][1]['productID'] . "<br>";
            echo "Name: " . $_SESSION['cart'][1]['name'] . "<br>";
            echo "Quantity: " . $_SESSION['cart'][1]['quantity'] . "<br>";
        } else {
            echo "Test Failed! No item was added to the cart.<br>";
        }

        // check if shoe was added
        if (isset($_SESSION['cart'][2])) {
            echo "Test Passed! The item was added to the cart.<br>";
            echo "Product ID: " . $_SESSION['cart'][2]['productID'] . "<br>";
            echo "Name: " . $_SESSION['cart'][2]['name'] . "<br>";
            echo "Quantity: " . $_SESSION['cart'][2]['quantity'] . "<br>";
        } else {
            echo "Test Failed! No item was added to the cart.<br>";
        }
        // print the whole session
        echo "<pre>";
        print_r($_SESSION['cart']);
        echo "</pre>";
    }
}

// run the test
CartAddItemTest::runTest();