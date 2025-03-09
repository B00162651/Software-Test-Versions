<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HappyFeet - Home</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<?php require 'layout/navbar.php'; ?>

<section class="product-container">
    <?php
    $products = [
        ["name" => "Nike Air Force", "price" => 200, "image" => "images/AFS.png", "desc" => "Durable and stylish."],
        ["name" => "Batman Crocs", "price" => 300, "image" => "images/batman.jpg", "desc" => "BATMAN CROCS!!!"],
        ["name" => "Yeezy", "price" => 500, "image" => "images/addidas.jpg", "desc" => "Stylish  comfort."],
        ["name" => "Asics", "price" => 150, "image" => "images/asics.jpg", "desc" => "Great for running."],
        ["name" => "New Balance", "price" => 150, "image" => "images/NB.jpg", "desc" => "Amazing comfort."]
    ];

    foreach ($products as $product) {
        ?>
        <div class="product-card">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <div class="product-info">
                <h3><?php echo $product['name']; ?> <span>€<?php echo $product['price']; ?></span></h3>
                <p><?php echo $product['desc']; ?></p>
            </div>
        </div>
        <?php
    }
    ?>
</section>

<?php require 'layout/footer.php'; ?>

</body>
</html>
