<?php
session_start();

if ($_SESSION['Active'] == false) {
    // Redirect user to Login.php if not logged in
    header("location:./Session/login.php");
    exit;
}

require 'DB/config.php'; // Ensure this points to the correct configuration file
require 'Cart/Cart.php';

$cart = new Cart();
$total = $cart->getTotalPrice();
$email = $_SESSION['email']; // Get the logged-in user's email

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $eir = trim($_POST['eir']);
    $cardNumber = trim($_POST['cardNumber']);
    $expiryDate = trim($_POST['expiryDate']);
    $cvv = trim($_POST['cvv']);

    $error = "";

    // Validate CVV
    if (!is_numeric($cvv) || strlen($cvv) !== 3) {
        $error = "The CVV must be exactly 3 digits.";
    } else {
        try {
            // Simulate payment success for now
            $paymentSuccess = true;

            if ($paymentSuccess) {
                // Write order details to the database
                $new_order = array(
                    "email" => $email,
                    "name" => $name,
                    "eircode" => $eir,
                    "date" => date("Y-m-d H:i:s"), // Current date and time
                    "total" => $total
                );

                $sql = sprintf(
                    "INSERT INTO orderHistory (%s) VALUES (%s)",
                    implode(", ", array_keys($new_order)),
                    ":" . implode(", :", array_keys($new_order))
                );
                $statement = $connection->prepare($sql);
                $statement->execute($new_order);

                // Clear the cart
                $cart->clearCart();

                // Redirect to the checkout completion page
                header("Location: checkoutComplete.php");
                exit();
            } else {
                $error = "Payment failed. Please try again.";
            }
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>

<form action="" method="POST">
    <a href="cart.php">Back to Cart</a>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <h2>Shipping Details</h2>
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" required>

    <label for="eir">Eir Code</label>
    <input type="text" id="eir" name="eir" required>

    <h2>Payment Details</h2>
    <label for="cardNumber">Card Number</label>
    <input type="text" id="cardNumber" name="cardNumber" required>

    <label for="expiryDate">Expiry Date (MM/YY)</label>
    <input type="text" id="expiryDate" name="expiryDate" required>

    <label for="cvv">CVV</label>
    <input type="text" id="cvv" name="cvv" required>

    <h3>Total: €<?= number_format($total, 2) ?></h3>

    <button type="submit">Complete Purchase</button>
</form>

</body>
</html>