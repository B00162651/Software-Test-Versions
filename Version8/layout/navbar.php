
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css?v=1">
</head>
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="index.php" class="brand">HappyFeet</a>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="casual.php">Casual</a></li>
            <li><a href="sport.php">Sport</a></li>
        </ul>

        <!-- Icons (Search, Cart, Profile) -->
        <div class="nav-icons">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="./profile.php"><i class="fas fa-user"></i></a>
            <form action="/Version7/Session/logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
        </div>

    </div>

</nav>
