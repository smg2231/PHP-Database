<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "cmsdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM formdata";
$result = $conn->query($sql);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($result->num_rows > 0) {
    // Loop through the records and display them. method retrieves each row as a numeric array. the rows correspond to rows in database
    while($row = $result->fetch_assoc()) {
        echo "<ul>"; //unordered list displayed as list items
        echo "<li><strong>Name:</strong> " . $row["name"] . "</li>";
        echo "<li><strong>Email:</strong> " . $row["email"] . "</li>";
        echo "<li><strong>Language:</strong> " . $row["language"] . "</li>";
        echo "<li><strong>Note:</strong> " . $row["note"] . "</li>";
        echo "<li><strong>Hours:</strong> " . $row["hours"] . "</li>";
        echo "<li><strong>Hobbies:</strong> " . $row["hobbies"] . "</li>";
        echo "<li><strong>ID:</strong>".$row["id"]."</li>";
        echo "<td>"."<a href = 'delete.php?id=".$row["id"]."'>DELETE</a>"."</td><br>";
        echo "<br><td>"."<a href = 'update.php?id=".$row["id"]."'>UPDATE</a>"."</td>";
        echo "</ul>";
    }
} else {
    echo "No records found.";
}
// Close connection
$conn->close();
?>