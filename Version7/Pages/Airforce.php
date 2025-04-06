<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    

     


</head>

<?php 
require '../layout/PagesNavbar.php';
// inheritance   
require 'shoe.php'; 

?>

<section class="product-container">
    <?php
    // DB connection
    require '../DB/config.php';

    //the shoe object 
    $shoe = new Shoe();

    // get the shoe by ID
    $shoe->getShoeByID($connection, 1);

    // display the details
    echo $shoe->displayShoe();
    ?>
</section>

<?php require '../layout/Pagesfooter.php'; ?>
</body>
</html>