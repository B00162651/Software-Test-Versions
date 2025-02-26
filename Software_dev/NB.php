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
    ["name" => "New Balance", "price" => 150, "image" => "images/NB.jpg", "link" => "NB.php"],
    
];

foreach ($bestsellers as $product) { ?>
    <div class="col-md-4 product-list-item">
        <a href="/Software_dev/<?php echo $product['link']; ?>">
            <center><img src="/Software_dev/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img"></center>
        </a>
        <center><h3><?php echo $product['name']; ?></h3></center>
        <center><p>Price: €<?php echo $product['price']; ?></p></center>
        <center><p>Classic sneakers from New Balance in the model MR530SG. These white sneaks have fine details in navy and silver. They have a perfect fit and are comfortable all day long. These will be your new go-to sneakers as they go with everything in your wardrobe and are great to wear.</p></center>
    </div>
<?php } ?>
</div>










<?php require 'layout/footer.php';?>
</body>
</html>