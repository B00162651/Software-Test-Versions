<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    
    <link href="css/main.css" rel="stylesheet">

   
</head>

<body>
<?php require 'layout/header.php';?>
<center><h1>HappyFeet: The next generation of style!</h1></center>

<div class="product-container">
<?php
// Hardcoded array of bestselling products
$bestsellers = [
    ["name" => "Nike Air Forces", "price" => 200, "image" => "images/AFS.png", "link" => 'Airforce.php'],
    ["name" => "Batman Crocs", "price" => 300, "image" => "images/batman.jpg", "link" => "Crocs.php"],
    ["name" => "Yeezy", "price" => 500, "image" => "images/addidas.jpg", "link" => "Yeezy.php"],
    ["name" => "Asics", "price" => 150, "image" => "images/asics.jpg", "link" => "Asics.php"],
    ["name" => "New Balance", "price" => 150, "image" => "images/NB.jpg", "link" => "NB.php"],
];

// Loop through the top 5 bestsellers
for ($i = 0; $i < count($bestsellers); $i++) { 
    ?>
    <div class="col-md-4 product-list-item">
        <!-- Make only the image clickable -->
        <a href="/Software_dev/<?php echo $bestsellers[$i]['link']; ?>">
        <img src="/Software_dev/<?php echo $bestsellers[$i]['image']; ?>" alt="<?php echo $bestsellers[$i]['name']; ?>" class="img-rounded">
        </a>

        <h3><?php echo $bestsellers[$i]['name']; ?></h3>
        <p>Price: €<?php echo $bestsellers[$i]['price']; ?></p>
        <hr>
    </div>
    <?php
}
?>
</div>



<?php require 'layout/footer.php';?>
</body>
</html>