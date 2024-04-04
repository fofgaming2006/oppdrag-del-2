

<?php

$dbhost = "localhost";
$username = "root";
$password = "admin";
$database = "oppdrag";

// Create database connection
$con = new mysqli($dbhost, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

echo "Hendvendelse fullført";

 // Redirect user back to index.php
 header("Location: index.php");
 //exit; // Make sure to exit after the redirect

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $sakNavn = $_POST["Navn"];
    $sakEmail = $_POST["Email"];
    $sakBeskrivelse = $_POST["Beskrivelse"];

    // Insert data into the database
    $sql = "INSERT INTO saker(Saksnummer, Navn, Email, Beskrivelse)
    VALUES ('x', '$sakNavn', '$sakEmail', '$sakBeskrivelse')";

    $result = mysqli_query($con, $sql)
    or die('Error querying database.');

    // Close database connection
    mysqli_close($con);

}


$con->close();
?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <title>Legg Til Hendvendelse</title>
    </head>
    <body class="body">

    <a href="login.php"><input class="logout-button" type="submit" name="submit" value="LogOut"></a>
    <a href="status.php"><input class="logout-button" type="submit" name="submit" value="SjekkStatus"></a>

    <form action="index.php" method="POST">
    
    <h1 class="beskrivelse-title" >Legg Til Beskrivelse</h1>

    <p class="navn-title">Navn</p>
    <input class="navn-input" type="text" name="Navn" id="Navn">

    <p class="email-title">Email</p>
    <input class="navn-input" type="text" name="Email" id="Email">

    <p class="saksbeskrivelse" id="Beskrivelse">Beskrivelse Til Kundens Problem</p>
    <textarea class="saksbeskrivelse-textform" name="Beskrivelse" cols="30" rows="10"></textarea>

    <br>
    <button class="klage-button" type="submit">Send Inn Klage</button>
    </form>
    </body>
    </html>

