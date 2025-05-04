<?php
require_once __DIR__ . '/../Pages/shoe.php';

class Cart {
    public function __construct() {
        // Initialize the cart session if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Add a shoe to the cart
    public function addItem($shoe) {
        $id = $shoe->getproductID();

        // Check if the product ID exists in the cart
        if (isset($_SESSION['cart'][$id])) {
            // Increment the quantity if the product already exists
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            // Add a new product to the cart
            $_SESSION['cart'][$id] = [
                'productID' => $shoe->getproductID(),
                'name' => $shoe->getName(),
                'price' => $shoe->getPrice(),
                'description' => $shoe->getDescription(),
                'imagePath' => $shoe->getImagePath(),
                'quantity' => 1
            ];
        }
    }

    // Remove an item from the cart by product ID
    public function removeItem($productID) {
        if (isset($_SESSION['cart'][$productID])) {
            unset($_SESSION['cart'][$productID]);
        }
    }

    // Clear the entire cart
    public function clearCart() {
        $_SESSION['cart'] = [];
    }

    // Get all items in the cart
    public function getItems() {
        $items = [];
        foreach ($_SESSION['cart'] as $cartItem) {
            // Validate required keys before reconstructing the Shoe object
            if (!isset(
                $cartItem['productID'],
                $cartItem['name'],
                $cartItem['price'],
                $cartItem['description'],
                $cartItem['imagePath'],
                $cartItem['quantity']
            )) {
                continue; // Skip incomplete items
            }

            // Reconstruct the Shoe object
            $shoe = new Shoe();
            $shoe->setId($cartItem['productID']);
            $shoe->setName($cartItem['name']);
            $shoe->setPrice($cartItem['price']);
            $shoe->setDescription($cartItem['description']);
            $shoe->setImagePath($cartItem['imagePath']);

            $items[] = [
                'shoe' => $shoe,
                'quantity' => $cartItem['quantity']
            ];
        }
        return $items;
    }

    // Calculate the total cost of the cart
    public function calculateTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $cartItem) {
            // Validate that price and quantity exist
            if (isset($cartItem['price'], $cartItem['quantity'])) {
                $total += $cartItem['price'] * $cartItem['quantity'];
            }
        }
        return $total;
    }

    // Get the total price of the cart
    public function getTotalPrice() {
        return $this->calculateTotal();
    }
}