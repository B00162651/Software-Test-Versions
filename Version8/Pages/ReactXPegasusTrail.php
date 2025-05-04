<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pages.css">


    <title>HappyFeet</title>

</head>

<?php
require '../layout/PagesNavbar.php';
// inheritance
require '../Pages/shoe.php';
?>
<?php
 session_start();
?>

<section class="product-container">
    <?php

    // DB connection
    require '../DB/config.php';

    //the shoe object
    $shoe = new Shoe();

    // get the shoe by ID
    $shoe->getShoeByID($connection, 20);

    // display the details
    echo $shoe->displayShoe();
    ?>
</section>

<?php require '../layout/PagesFooter.php'; ?>
</body>
</html>