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
<center><h1>Our Bestseller!</h1></center>
<center><h3>Find some of our products here</h3></center>

<?php
// Hardcoded array of bestselling products
$bestsellers = [
    ["name" => "Nike Air Forces", "Price: €" => 200, "image" => "images/AFS.png"],
];

// Loop through the top 5 bestsellers
for ($i = 0; $i < 1; $i++) {
    ?>
    <div class="col-md-4 product-list-item">
    <center><img src=<?php echo $bestsellers[$i]['image']; ?>></center>
        <center><h3><?php echo $bestsellers[$i]['name']; ?></h3></center>
        <center><p>Price: $<?php echo $bestsellers[$i]['Price: €']; ?></p></center>
        <hr>
        <center><p>Comfortable, durable and timeless—it's number one for a reason. The classic '80s construction pairs smooth leather with bold details for style that tracks whether you're on court or on the go.</p></center> 

    </div>
    <?php
}
?>
















<?php require 'layout/footer.php';?>
</body>
</html>