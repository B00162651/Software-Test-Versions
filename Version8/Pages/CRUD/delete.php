<?php

$success = '';

// Define the escape() function
function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

// Check if a product ID is provided
if (isset($_GET["id"])) {
    try {
        // DB connection
        require_once '../../DB/config.php';
        require '../../DB/common.php';

        // Get the product ID
        $productID = $_GET["id"];

        // SQL query to delete the product from the DB
        $sql = "DELETE FROM product WHERE productID = :productID";
        $statement = $connection->prepare($sql);

        // Bind the product ID to the query
        $statement->bindValue(':productID', $productID);

        // Execute the delete query
        $statement->execute();

        // Success message
        echo 'Product successfully deleted!';

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

// Get all products to display in the table
try {
    require_once '../../DB/config.php';
    $sql = "SELECT * FROM product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

} catch(PDOException $error) {
    // Any errors
    echo $sql . "<br>" . $error->getMessage();
}
?>


<h2>Delete Products</h2>
<a href="../../index.php">Back to home</a>
<a href="Update.php">Products list</a>

<!-- Product Table -->
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image Path
        <th>Link</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["productID"]); ?></td>
            <td><?php echo escape($row["Name"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
            <td><?php echo escape($row["Description"]); ?></td>
            <td><?php echo escape($row["imagePath"]); ?></td>
            <td><?php echo escape($row["link"]); ?></td>
            <td>
                <!-- Delete row -->
                <a href="delete.php?id=<?php echo escape($row["productID"]); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="../../index.php">Back to home</a>
<a href="Update.php">Products list</a>