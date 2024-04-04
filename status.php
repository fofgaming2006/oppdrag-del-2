<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sjekk Status</title>
</head>
<body>
    
<h2 class="status-title" >Sjekk Status</h2>

<!---Skjema Over Status--->
<form action="" method="post" >
    <p class="saksnummer">Saksnummer</p>
    <input class="saksnummer-input"  id="Saksnummer" name="saksnummer" type="text">
    <input type="submit" value="Sjekk Status"></input>
</form>

<?php 

include("connect.php"); //Inkluderer databasetilkobling

//Sjekker om skjemaet er sendt
if ($SERVER_["REQUEST_METHOD"] == "POST") {
    $saksnummer = mysqli_real_escape_string($con, $_POST['Saksnummer']);

    $sql = "SELECT * FROM saker WHERE Saksnummer = ?";
}

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $saksnummer);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Henter første rad fra resultatet
        $row = mysqli_fetch_assoc($result);
        echo "<h3>Informasjon for saksnummer $saksnummer:</h3>";
        echo "Navn: " . $row['Navn'] . "<br>";
        echo "E-Post: " . $row['Email'] . "<br>";
        echo "Beskrivelse: " . $row['Beskrivelse'] . "<br>";
        echo "Status: " . $row['Status'] . "<br>";
    } else {
        // Hvis saksnummeret ikke ble funnet
        echo "Ingen henvendelse med dette saksnummeret ble funnet";
    }
} else {
    // Hvis det oppstod en feil ved henting av resultatet
    echo "Error ved henting av status: " . mysqli_error($con);
}
?>

</body>
</html>