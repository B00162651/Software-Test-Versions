<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    

    <link href="css/main.css" rel="stylesheet">

   
</head>

<body>

<?php require 'layout/navbar.php';?>
<center><h2>Product Description</h1></center>
<div class="product-container">
<?php
// Hardcoded array of bestselling products
$bestsellers = [
    ["name" => "Nike Air Forces", "price" => 200, "image" => "images/AFS.png", "link" => "Airforce.php"],
    
];

foreach ($bestsellers as $product) { ?>
    <div class="col-md-4 product-list-item">
        <a href="/Software_dev/<?php echo $product['link']; ?>">
            <center><img src="/Software_dev/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img"></center>
        </a>
        <center><h3><?php echo $product['name']; ?></h3></center>
        <center><p>Price: €<?php echo $product['price']; ?></p></center>
        <center><p>Comfortable, durable and timeless—it's number one for a reason. The classic '80s construction pairs smooth leather with bold details for style that tracks whether you're on court or on the go.</p></center>
    </div>
<?php } ?>
</div>










<?php require 'layout/footer.php';?>
</body>
</html>