<style>
label {
display: block;
margin: 5px 0;
}
</style>
<?php
    require '../../DB/config.php';

if (isset($_POST['submit'])) {
    try {
    $new_product = array(
        "productID" => $_POST['productID'],
        "Name" => $_POST['Name'],
        "Description" => $_POST['Description'],
        "Price" => $_POST['Price'],
        "tags" => $_POST['tags'],
        "imagePath" => $_POST['imagePath'],
        "link" => $_POST['link']
    );
    // as the constructor
    $sql = sprintf("INSERT INTO product (%s) VALUES (%s)",
    implode(", ", array_keys($new_product)),
    ":" . implode(", :", array_keys($new_product)));
    $statement = $connection->prepare($sql);
    $statement->execute($new_product);
    echo 'Product successfully added!';

    } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
}
    ?>
    <h2>Add a Product</h2>
    <form method="post">
    <label for="productID">Product ID</label>
    <input type="text" name="productID" id="productID" required>
    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name" required>
    <label for="Description	">Description</label>
    <input type="text" name="Description" id="Description" required>
    <label for="Price">Price</label>
    <input type="text" name="Price" id="Price">
    <label for="tags">Tags</label>
    <input type="text" name="tags" id="tags">
    <label for="imagePath">Image Path</label>
    <input type="text" name="imagePath" id="imagePath">
    <label for="link">Link</label>
    <input type="text" name="link" id="link">

    <input type="submit" name="submit" value="Submit">
    </form>
    <br>
    <a href="../../index.php">Back to home</a>
    <?php include "../../layout/Pagesfooter.php"; ?>