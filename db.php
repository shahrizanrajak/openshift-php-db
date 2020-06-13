<?php
$servername = getenv("MARIADB_SERVICE_HOST");
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");
$dbname = getenv("MYSQL_DATABASE");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname, alterego FROM avengers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>FirstName</th><th>LastName</th><th>Alter Ego</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td> " . $row["alterego"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
