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
    ["name" => "Batman Crocs", "price" => 300, "image" => "images/batman.jpg", "link" => "Crocs.php"],
    
];

foreach ($bestsellers as $product) { ?>
    <div class="col-md-4 product-list-item">
        <a href="/Software_dev/<?php echo $product['link']; ?>">
            <center><img src="/Software_dev/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img"></center>
        </a>
        <center><h3><?php echo $product['name']; ?></h3></center>
        <center><p>Price: €<?php echo $product['price']; ?></p></center>
        <center><p>t's high-octane style. The Batman Batmobile Classic Clog is ready to own the night (and the day) with a design inspired by Batman’s ride — right down to the bat wings on the side of the strap. And you can customize your new favorite mode of transportation, with Jibbitz™ charms. To the Batcave!</p></center>
    </div>
<?php } ?>
</div>










<?php require 'layout/footer.php';?>
</body>
</html>