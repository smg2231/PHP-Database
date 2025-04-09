<?php
$output = "";
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "cmsdb";
$sql = "INSERT INTO formdata (`name`,`email`,`language`,`note`,`hours`,`hobbies`)
VALUES (";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_REQUEST["name"]) && trim($_REQUEST["name"]) != "") {
    $output .= $_REQUEST["name"] . "\t";
    $sql  .= "'".$_REQUEST["name"] . "',";
} else {
    $output .= "NO NAME DUDE!\t";
    $sql  .= "'',";
}
$sql  .= "'".$_REQUEST["email"] . "',";
$sql  .= "'".$_REQUEST["language"] . "',";
$sql  .= "'".$_REQUEST["note"] . "',";
$output .= (isset($_REQUEST["email"]) ? $_REQUEST["email"] : "") . "\t";
$output .= (isset($_REQUEST["language"]) ? $_REQUEST["language"] : "") . "\t";
$output .= (isset($_REQUEST["note"]) ? $_REQUEST["note"] : "") . "\t";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $output .= (isset($_REQUEST["hours"]) ? $_REQUEST["hours"] : "") . "\t";
    $sql  .= "'".$_REQUEST["hours"] . "',";
    if (isset($_POST['hobbies']) && !empty($_POST['hobbies'])) {
        $output .= implode(",", $_POST['hobbies']) . "\t";
        $sql .="'" . implode("|", $_REQUEST["hobbies"]) . "')";
    } else {
        $output .= "No hobbies selected.\t";
    }
}
echo $sql;
$output = rtrim($output, "\t") . "\n";
$file = 'form_submissions.txt';
$handle = fopen($file, 'a');

if ($handle) {
    if (fwrite($handle, $output) !== false) {
        echo "Data saved.<br>";
    } else {
        echo "Write error.<br>";
    }
    fclose($handle);
} else {
    echo "Open error.<br>";
}
if(isset($_REQUEST["name"]) && trim($_REQUEST["name"]) != ""){
    print($_REQUEST["name"] . "<br>");
}
else {
    print("NO NAME DUDE!". "<br>");
}
print($_REQUEST["email"]. "<br>");
print($_REQUEST["language"]. "<br>");
print($_REQUEST["note"]. "<br>");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST["hours"])) {
        $selectedOption = $_REQUEST["hours"];
        echo "You selected: " . $selectedOption . " hour(s)". "<br>";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hobbies']) && !empty($_POST['hobbies'])) {
    $hobbies = $_POST['hobbies'];
    echo "Selected Hobbies:<br>";
    foreach ($hobbies as $hobby) {
        echo htmlspecialchars($hobby) . "<br>";
    }
} else {
    echo "No hobbies selected.";
}
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "<br><br><a href = 'list.php'>Back to List</a>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
?>