<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    
    <link href="css/main.css" rel="stylesheet">

   
</head>

<body>
<?php require 'layout/header.php';?>`
<h1>HappyFeet: The next generation of style!</h1>

<div class="product-container">
<?php
// Hardcoded array of bestselling products
$bestsellers = [
    ["name" => "Nike Air Forces", "Price: €" => 200, "image" => "images/AFS.png", "link" => "AirForce.php"],
    ["name" => "Batman Crocs", "Price: €" => 300, "image" => "images/batman.jpg"],
    ["name" => "Yeezy", "Price: €" => 500, "image" => "images/addidas.jpg"],
    ["name" => "Asics", "Price: €" => 150, "image" => "images/asics.jpg"],
    ["name" => "New Balance", "Price: €" => 150, "image" => "images/NB.jpg"],
];

// Loop through the top 5 bestsellers
for ($i = 0; $i < 5; $i++) {
    ?>
    <div class="col-md-4 product-list-item">
        <img src=<?php echo $bestsellers[$i]['image']; ?>>
        <h3><?php echo $bestsellers[$i]['name']; ?></h3>
        <p>Price: $<?php echo $bestsellers[$i]['Price: €']; ?></p>

    </div>
    <?php
}
?>
</div>



<?php require 'layout/footer.php';?>
</body>
</html>