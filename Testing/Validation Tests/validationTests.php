<?php

/* Test Code For CVV Validation */
$cvvError = "";
$cvvSuccess = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cvv'])) {
    $cvv = trim($_POST['cvv']);
    if (!is_numeric($cvv) || strlen($cvv) !== 3) {
        $cvvError = "The CVV must be exactly 3 digits.";
    } else {
        $cvvSuccess = "CVV validation passed. The CVV is valid.";
    }
}
?>

<h1>Test CVV Validation</h1>
<?php if (!empty($cvvError)): ?>
    <p style="color: red;"><?= htmlspecialchars($cvvError) ?></p>
<?php elseif (!empty($cvvSuccess)): ?>
    <p style="color: green;"><?= htmlspecialchars($cvvSuccess) ?></p>
<?php endif; ?>

<form action="" method="POST">
    <label for="cvv">Enter CVV</label>
    <input type="text" id="cvv" name="cvv" required>
    <button type="submit">Validate CVV</button>
</form>






<?php

/* Test Code For Cart Validation */
$cartError = "";
$cartSuccess = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cartItems'])) {
    $cartItems = $_POST['cartItems'];
    if ($cartItems === 'empty') {
        $cartError = "The cart is empty. You cannot proceed to checkout.";
    } else {
        $cartSuccess = "The cart is not empty. Proceed to checkout.";
    }
}
?>

<h1>Test Cart Empty Validation</h1>
<?php if (!empty($cartError)): ?>
    <p style="color: red;"><?= htmlspecialchars($cartError) ?></p>
<?php elseif (!empty($cartSuccess)): ?>
    <p style="color: green;"><?= htmlspecialchars($cartSuccess) ?></p>
<?php endif; ?>

<form action="" method="POST">
    <label for="cartItems">Test Cart</label>
    <select id="cartItems" name="cartItems">
        <option value="empty">Empty Cart</option>
        <option value="notEmpty">Cart with Items</option>
    </select>
    <button type="submit">Test Cart</button>
</form>





<?php

/* Test Code For Account Existence Validation */
$emailError = "";
$emailSuccess = "";

$existingEmails = ["111@123", "ben@gmail.com"];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (in_array($email, $existingEmails)) {
        $emailError = "This email is already registered.";
    } else {
        $emailSuccess = "Email validation passed. The email is valid and not already registered.";
    }
}
?>

<h1>Test Account Existance</h1>
<?php if (!empty($emailError)): ?>
    <p style="color: red;"><?= htmlspecialchars($emailError) ?></p>
<?php elseif (!empty($emailSuccess)): ?>
    <p style="color: green;"><?= htmlspecialchars($emailSuccess) ?></p>
<?php endif; ?>

<form action="" method="POST">
    <label for="email">Enter Email</label>
    <input type="text" id="email" name="email" placeholder="Enter email for testing" required>
    <button type="submit">Check Existance</button>
</form>




<?php

/* Test Code For Password Length Validation */
$passwordError = "";
$passwordSuccess = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = trim($_POST['password']);
    if (strlen($password) < 8) {
        $passwordError = "Password must be at least 8 characters long.";
    } else {
        $passwordSuccess = "Password validation passed. The password is valid.";
    }
}
?>

<h1>Test Password Validation</h1>
<?php if (!empty($passwordError)): ?>
    <p style="color: red;"><?= htmlspecialchars($passwordError) ?></p>
<?php elseif (!empty($passwordSuccess)): ?>
    <p style="color: green;"><?= htmlspecialchars($passwordSuccess) ?></p>
<?php endif; ?>

<form action="" method="POST">
    <label for="password">Enter Password</label>
    <input type="password" id="password" name="password" placeholder="Enter password for testing" required>
    <button type="submit">Validate Password</button>
</form>

<?php




/* Test Code For Login Validation */
$loginResult = "";

function simulateLogin($emailInput, $passwordInput) {
    $users = [
        ["email" => "111@123", "password" => "11111"],
        ["email" => "ben@gmail.com", "password" => "qwerty"]
    ];

    if (empty($emailInput) || empty($passwordInput)) {
        return "Email and password are required.";
    }

    foreach ($users as $user) {
        if ($user['email'] === $emailInput) {
            if ($user['password'] === $passwordInput) {
                return "Login successful.";
            } else {
                return "Incorrect email or password.";
            }
        }
    }

    return "Incorrect email or password.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
    $loginEmail = trim($_POST['loginEmail']);
    $loginPassword = $_POST['loginPassword'];
    $loginResult = simulateLogin($loginEmail, $loginPassword);
}
?>

<h1>Test Login Validation</h1>
<?php if (!empty($loginResult)): ?>
    <p style="<?= $loginResult === 'Login successful.' ? 'color: green;' : 'color: red;' ?>">
        <?= htmlspecialchars($loginResult) ?>
    </p>
<?php endif; ?>

<form action="" method="POST">
    <label for="loginEmail">Enter Email</label>
    <input type="text" id="loginEmail" name="loginEmail" placeholder="Enter email for testing" required>

    <label for="loginPassword">Enter Password</label>
    <input type="password" id="loginPassword" name="loginPassword" placeholder="Enter password for testing" required>

    <button type="submit">Test Login</button>
</form>

</body>
</html>