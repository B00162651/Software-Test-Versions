<?php
session_start(); // Start the session to access $_SESSION
require '../DB/config.php'; // Ensure this points to the correct database config file
require '../Pages/Shoe.php'; // Include the Shoe class
require '../Cart/Cart.php'; // Include the Cart class

if (isset($_GET['productID'])) {
    $productID = intval($_GET['productID']); // Sanitize the productID

    // Create a new Shoe object and populate it from the database
    $shoe = new Shoe();
    $shoe->getShoeByID($connection, $productID); // Fetch shoe data from the database

    // Add the shoe to the cart
    $cart = new Cart();
    $cart->addItem($shoe);

    // Redirect to the cart page
    header("Location: ../cart.php");
    exit();
}
?>