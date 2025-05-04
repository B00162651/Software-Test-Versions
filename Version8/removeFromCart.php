<?php
session_start();
require 'Cart/Cart.php';

if (isset($_GET['productID'])) {
    $productID = intval($_GET['productID']);

    $cart = new Cart();

    if (isset($_SESSION['cart'][$productID])) {

        if ($_SESSION['cart'][$productID]['quantity'] > 1) {

            $_SESSION['cart'][$productID]['quantity'] -= 1;

        }

        else {
            $cart->removeItem($productID);
        }
    }
}

header("Location: cart.php");
exit();