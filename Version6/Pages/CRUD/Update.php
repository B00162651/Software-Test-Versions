<?php
/**
 * List all products with a link to edit or delete
 */
try {
    require_once '../../DB/config.php';
    require '../../DB/common.php';

    // Fetch all products from the database
    $sql = "SELECT * FROM product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>



<h2>Manage Products</h2>

<table>
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price (€)</th>
        <th>Description</th>
         <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        </thead>
    <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row["productID"]); ?></td>
                <td><?php echo htmlspecialchars($row["Name"]); ?></td>
                <td>€<?php echo htmlspecialchars($row["Price"]); ?></td>
                <td><?php echo htmlspecialchars($row["Description"]); ?></td>
                <td><a href="updateProduct.php?id=<?php echo htmlspecialchars($row["productID"]); ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo htmlspecialchars($row["productID"]); ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="../../index.php">Back to home</a>
