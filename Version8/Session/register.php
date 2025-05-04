<?php
session_start();
// Part 6 step 1: Server-side validation

// Part 6 step 4: Transfer data from registration form into DB
if (isset($_POST['submit'])) {
    require "../DB/common.php";

    // Initialize error message
    $error = "";

    try {
        require_once '../DB/config.php';

        $email = $_POST['email']; // Raw user input
        $password = $_POST['password']; // Raw user input

        // Validate email
        $sql = "SELECT email FROM account WHERE email = :email";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "This email is already registered.";
        }

        // Validate password length
        elseif (strlen($password) < 8) {
            $error = "Password must be at least 8 characters long.";
        }

        if (empty($error)) {
            // Add new user to the database
            $new_user = array(
                "email" => escape($_POST['email']),
                "password" => escape($_POST['password'])
            );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "account",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
            );
            $statement = $connection->prepare($sql);
            $statement->execute($new_user);

            if ($statement) {
                // Redirect to login page on success
                echo $new_user['email'] . ' successfully added.';
                header("Location: login.php");
                exit();
            }
        }
    } catch (PDOException $e) {
        // Catch database errors
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
<div class="container">
    <form action="" method="post" name="Register_Form" class="form-signin">
        <a href="../index.php" class="home-link">Home</a>
        <h2 class="form-signin-heading">Register</h2>
        <h4 class="form-signin-heading">Already a member? <a href="login.php" class="signup-link">Sign In!</a></h4>

        <!-- Display error messages if any -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <label for="inputEmail">Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control" required placeholder="Enter your email">

        <label for="inputPassword">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Make a valid Password" required>

        <button type="submit" name="submit" class="button">Register</button>
    </form>
</div>
</body>
</html>