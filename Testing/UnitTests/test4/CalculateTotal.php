<?php

session_start();

// necessary classes
require_once __DIR__ . '/cart.php';  
require_once __DIR__ . '/shoe.php';  


class CartCalculationTest {
    public static function runTest() {
        
        $_SESSION['cart'] = [];

        // cart object
        $cart = new Cart();

        // make new shoe objects
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

          // show individual item prices
          echo "<h1>Cart Calculation Test</h1>";
          echo "Item 1: " . $shoe1->getName() . " - €" . $shoe1->getPrice() . "<br>";
          echo "Item 2: " . $shoe2->getName() . " - €" . $shoe2->getPrice() . "<br>";
          echo "Item 3: " . $shoe1->getName() . " - €" . $shoe1->getPrice() . "<br>";
  
          // gather total price
          $totalPrice = $cart->getTotalPrice();
  
          // show total price
          echo "----------------------------------------------------------------"  . "<br>";  // This should show 100 + 100 + 150 = 350
          echo "Total Price: €" . $totalPrice . "<br>";  // This should show 100 + 100 + 150 = 350
      }
  }

// run the test
CartCalculationTest::runTest();
?>