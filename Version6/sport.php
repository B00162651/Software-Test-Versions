<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HappyFeet - Sport</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<?php require 'layout/navbar.php'; ?>

<section class="product-container">
    <?php
    // include the database connection
    require 'DB/config.php';
    // Query to fetch all products from the product table

    $sql = "SELECT * FROM product WHERE tags = 'Sport'";
    $statement = $connection->prepare($sql);
    //preprared
    $statement->execute();
    // Fetch all products
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    // Display products if any are returned
    if ($products) {
        foreach ($products as $product) {
            ?>
            <div class="product-card">
                <!--clickable link now to selected product, set up in DB -->
                <a href="./Pages/<?php echo $product['link']; ?>">

                    <img src="<?php echo htmlspecialchars($product['imagePath']); ?>" alt="<?php echo htmlspecialchars($product['Name']); ?>">
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['Name']); ?> <span>€<?php echo htmlspecialchars($product['Price']); ?></span></h3>
                        <p><?php echo htmlspecialchars($product['Description']); ?></p>
                    </div>
            </div>
            <?php
        }
        // if problem occurs
    } else {
        echo "<p>No products found.</p>";
    }

    // close the database connection
    $connection = null;
    ?>
</section>

<?php require 'layout/footer.php'; ?>

</body>
</html>