<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HappyFeet - Profile</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>

<?php require 'layout/navbar.php'; ?>

<?php
session_start();

if($_SESSION['Active'] == false){ /* Redirects user to Login.php if
    not logged in. Remember, we set $_SESSION['Active'] == true in
    login.php*/
    header("location:./Session/login.php");
    exit;
}

try {
    require "DB/config.php";

    $sql = "SELECT * FROM orderHistory WHERE email = :email";
    $email = $_SESSION['email']; 
    $statement = $connection->prepare($sql);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php if ($result && $statement->rowCount() > 0): ?>
    <h2>Your Order History</h2>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Eircode</th>
            <th>Date</th>
            <th>Total (€)</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row["name"]); ?></td>
                <td><?php echo htmlspecialchars($row["eircode"]); ?></td>
                <td><?php echo htmlspecialchars($row["date"]); ?></td>
                <td><?php echo number_format($row["total"], 2); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No orders found for your account.</p>
<?php endif; ?>

<?php require 'layout/footer.php'; ?>

</body>
</html>