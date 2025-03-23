<?php
$success = ''; 

// check if a product id is provided
if (isset($_GET["id"])) {
    try {
        // db connection
        require_once '../../DB/config.php';
        require '../../DB/common.php';

        // get the product id
        $productID = $_GET["id"];

        // SQL query to delete the product from the db
        $sql = "DELETE FROM product WHERE productID = :productID";
        $statement = $connection->prepare($sql);

        // bind the product id to the query
        $statement->bindValue(':productID', $productID);

        // execute the delete query
        $statement->execute();

        // success message
        $success = "Product " . $productID . " successfully deleted.";
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

// get all products to display in the table
try {
    require_once '../../DB/config.php';
    $sql = "SELECT * FROM product"; 
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(); 
} catch(PDOException $error) {
    // any errors
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "../../layout/PagesNavbar.php"; ?>

<h2>Delete Products</h2>


<!-- Product Table -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image Path</th>
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
            <td>
                <!-- delete row -->
                <a href="delete.php?id=<?php echo escape($row["productID"]); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="../../index.php">Back to home</a>
<a href="Update.php">Products list</a>

<?php require "../../layout/PagesFooter.php"; ?>