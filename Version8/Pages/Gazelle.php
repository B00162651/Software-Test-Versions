<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet</title>

    

    <link href="css/index.css" rel="stylesheet">
     <link href="../css/navbar.css" rel="stylesheet">
 

</head>

<?php 

require '../layout/PagesNavbar.php';   
require 'shoe.php';            
?>

<section class="product-container">
    <?php
    // DB connection
    require '../DB/config.php';

    //the shoe object 
    $shoe = new Shoe();

    // get the shoe by ID
    $shoe->getShoeByID($connection, 2);

    // display the details
    echo $shoe->displayShoe();
    ?>
</section>

<?php require '../layout/Pagesfooter.php'; ?>
</body>
</html>