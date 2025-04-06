<?php
// all from crud app phase 2 for all the database components in this project 
require_once '../../DB/config.php';

// checks to see if form is submitted 
if (isset($_POST['submit'])) {
    try {
        require '../../DB/common.php';
        // get the data to use 
        $product = [
            "productID" => escape($_POST['productID']),
            "name" => escape($_POST['name']),
            "price" => escape($_POST['price']),
            "description" => escape($_POST['description']),
            "imagePath" => escape($_POST['imagePath'])
        ];
        // query to update the table
        $sql = "UPDATE product 
                SET Name = :name, 
                    Price = :price, 
                    Description = :description, 
                    imagePath = :imagePath
                WHERE productID = :productID";
        // prepare and update 
        $statement = $connection->prepare($sql);
        $statement->execute($product);
        // after update goes back to update page
        header('Location: Update.php');
        exit; 
    } catch (PDOException $error) {
        $errorMessage = $error->getMessage();
    }
}
// checks if the id for the profducts is provided 
if (isset($_GET['id'])) {
    try {
        require_once '../../DB/config.php';
        // gets id from the url
        $productID = $_GET['id'];
        // query to get the product by the id 
        $sql = "SELECT * FROM product WHERE productID = :productID";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':productID', $productID);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            echo "no product found!";
            exit;
        }
    } catch (PDOException $error) {
        echo "<p$error->getMessage()</p>";
        exit;
    }
} 
?>


<h2>Edit Product</h2>


    
<!-- form -->
<form method="post">
    <!-- wont show id -->
    <input type="hidden" name="productID" value="<?php echo htmlspecialchars($product['productID']); ?>">

    <label for="name">Product Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($product['Name']); ?>" required>

    <label for="price">Price (€):</label>
    <input type="text" name="price" value="<?php echo htmlspecialchars($product['Price']); ?>" required>

    <label for="description">Description:</label>
    <textarea name="description" required><?php echo htmlspecialchars($product['Description']); ?></textarea>

    <label for="imagePath">Image Path:</label>
    <input type="text" name="imagePath" value="<?php echo htmlspecialchars($product['imagePath']); ?>">

    <button type="submit" name="submit">Update Product</button>
</form>

<a href="Update.php">Back to Product List</a>

