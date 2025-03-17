<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    

    <link href="css/index.css" rel="stylesheet">
     <link href="../css/navbar.css" rel="stylesheet">
 

</head>

<?php 

require '../layout/Pagesnavbar.php';   
require 'shoe.php';            
?>

<section class="product-container">
    <?php
    // DB connection
    require '../config.php';

    //the shoe object 
    $shoe = new Shoe();

    // get the shoe by ID
    $shoe->getShoeByID($connection, 5);

    // display the details
    echo $shoe->displayShoe();
    ?>
</section>

<?php require '../layout/Pagesfooter.php'; ?>
</body>
</html>