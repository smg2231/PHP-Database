<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM formdata WHERE id=" . $_GET['id'];

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  echo "<a href = 'list.php'>Back to List</a>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>