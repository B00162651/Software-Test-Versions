<?php
session_start();
require 'Cart/Cart.php';
require 'layout/navbar.php';

$cart = new Cart();
$items = $cart->getItems();
$total = $cart->getTotalPrice();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - HappyFeet</title>
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>

<div class="container">

    <h1>Shopping Cart</h1>

    <div class="cart-layout">

        <div class="cart-items">

            <?php if (empty($items)): ?>
                <p>Your cart is empty. <a href="index.php">Continue Shopping</a></p>

            <?php else: ?>

                <?php foreach ($items as $entry):
                    $shoe = $entry['shoe'];
                    $quantity = $entry['quantity'];
                    ?>

                    <div class="cart-item">

                        <img src="<?= htmlspecialchars($shoe->getImagePath()) ?>" alt="<?= htmlspecialchars($shoe->getName()) ?>" class="cart-item-img">

                        <div class="cart-item-details">

                            <h2><?= htmlspecialchars($shoe->getName()) ?></h2>

                            <p>€<?= number_format($shoe->getPrice(), 2) ?></p>

                            <p>Quantity: <?= $quantity ?></p>
                        </div>


                        <a href="removeFromCart.php?productID=<?= htmlspecialchars($shoe->getproductID()) ?>" class="remove-btn">Remove</a>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Right Column: Order Summary -->
        <div class="order-summary">
            <h3>Your Order</h3>
            <p class="order-total">Order Total: €<?= number_format($total, 2) ?></p>

            <?php if (!empty($items)): ?>
                <a href="checkout.php" class="checkout-btn">Checkout</a>
            <?php else: ?>
                <p class="checkout-disabled">Add items to your cart to proceed to checkout.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require 'layout/footer.php'; ?>
</body>
</html>