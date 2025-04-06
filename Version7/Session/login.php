<!--  this is the databse login page  -->
<head>
<title>Sign in</title>

</head>

<body>

<a href="../index.php">Home</a>

   

</nav>
<div class="container">
    <!--Part 6 part 1-->
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <h4 class="form-signin-heading">If not a member <a href="register.php">sign up!</a></h4>
        <label for="inputEmail" >Email</label>
        <!--CLient side validation-->
        <input name="email" type="email" id="inputEmail" class="form-control" required placeholder="Enter a valid Email" required autofocus>
        <label for="inputPassword">Password</label>
        <!--CLient side validation-->
        <input name="Password" type="password" id="inputPassword" class="form-control" required placeholder="Enter a valid Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>

    <?php
session_start();
// part 6 step 1 server side validation
require("../DB/common.php");
function check() {
    if (isset($_POST['Submit'])) {
        //server side validation part 6 step 1 (paswword or username empty, error occurs)
        if (empty($_POST['email']) || empty($_POST['Password'])) {
            echo "<p>email and password are required</p>";
            return;
        }

        $tmpUser = trim($_POST['email']);
        $tmpPass = $_POST['Password'];

        try {
            // part 6 step 4 taking the database data and comparing it to see if it matches to login
            require_once("../DB/config.php");
            $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL query to select through the db for user input part 6 step 4 
            $sql = "SELECT email, password FROM Account WHERE email = :user";
            $stmt = $connection->prepare($sql);

            // Bind parameter
            $stmt->bindParam(":user", $tmpUser, PDO::PARAM_STR);
            $stmt->execute();

            // Fetch user data
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $fname_db = $result['email'];
                $pwd_db = $result['password'];

                //server side validation part 6 step 1 if correct goes to home
                if ($tmpUser == $fname_db && $tmpPass == $pwd_db) {
                    $_SESSION['email'] = $fname_db;
                    $_SESSION['Active'] = true;
                    header("Location: ../index.php");
                    exit;
                }
            }
            // error message
            echo "<p>Incorrect username or password</p>";

        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }
}

// call the function
check();
?>
