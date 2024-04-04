<?php

include("connect.php"); // Assuming this file handles database connection

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

   // Connects to database
   $con = mysqli_connect('localhost', 'root', 'admin', 'oppdrag')
   or die('Error connecting to MYSQL server.');

$query = "SELECT * from users where username='$username' and password='$password'";

$result = mysqli_query($con, $query)
   or die('Error querying database.');

// Disconnects from database  
mysqli_close($con);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        // Verify password securely
        if (password_verify($password, $user_data['password'])) {
            // Store minimal user data in session
            $_SESSION['ID'] = $user_data['ID'];
            $_SESSION['username'] = $user_data['username'];
            exit;
        } else {
            header('location: index.php'); // Redirect to the homepage after successful login
        }
    } else {
        $error = "<p class='feil'>Feil Brukernavn Eller Passord</p>";
    }
} else {
    // Uncomment the following line for debugging purposes
    // $error = "Form not submitted";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Log In</title>
</head>
<body class="login-body">
    <form class="form" method="post" action="login.php">
        <div class="container">
            <h1 class="title_login">Log-In</h1>
            <?php if(isset($error)) { echo "<p class='fail'>$error</p>"; } ?>
            <input class="login-input" type="text" placeholder="Username" name="username" required><br>
            <input class="login-input" type="password" placeholder="Password" name="password" required>
            <input class="button" type="submit" name="submit" value="LogIn">
            <p class="form_text">
                <a href="signup.php" class="form_link">Don't Have An Account? Signup now</a>
            </p>
        </div>
    </form>
</body>
</html>
