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
    ["name" => "Yeezy", "price" => 500, "image" => "images/addidas.jpg", "link" => "Yeezy.php"],
    
];

foreach ($bestsellers as $product) { ?>
    <div class="col-md-4 product-list-item">
        <a href="/Software_dev/<?php echo $product['link']; ?>">
            <center><img src="/Software_dev/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img"></center>
        </a>
        <center><h3><?php echo $product['name']; ?></h3></center>
        <center><p>Price: €<?php echo $product['price']; ?></p></center>
        <center><p>Contemporary and cool Yeezy boasts a street style ready repertoire showcased in these Boost 350 V2 Sneakers made with your youngster in mind. With a translucent sole, round toe and comfortable fabric, these trainers are ideal as part of your child's weekend weekend wardrobe.</p></center>
    </div>
<?php } ?>
</div>










<?php require 'layout/footer.php';?>
</body>
</html>