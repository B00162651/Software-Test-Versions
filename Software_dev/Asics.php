<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    

    <link href="../css/main.css" rel="stylesheet">

   
</head>

<body>
<?php require 'layout/header.php';?>
<center><h2>Product Description</h1></center>
<div class="product-container">
<?php
// Hardcoded array of bestselling products
$bestsellers = [
    ["name" => "Asics", "price" => 150, "image" => "images/asics.jpg", "link" => "Asics.php"],
    
];

foreach ($bestsellers as $product) { ?>
    <div class="col-md-4 product-list-item">
        <a href="/Software_dev/<?php echo $product['link']; ?>">
            <center><img src="/Software_dev/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img"></center>
        </a>
        <center><h3><?php echo $product['name']; ?></h3></center>
        <center><p>Price: €<?php echo $product['price']; ?></p></center>
        <center><p>EL Kayano 14 is a model that first saw the light of day at Asics in 2000. Now it's made in an updated design, but of course with the original midsole with GEL technology, which ensures you the best comfort and pleasant cushioning</p></center>
    </div>
<?php } ?>
</div>










<?php require 'layout/footer.php';?>
</body>
</html>