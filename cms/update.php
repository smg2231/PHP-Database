<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, intial-scale=1.0">
    <title>Update Form</title>
</head>
<body>
<?php
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
$sql = "SELECT `id`,`name`,`email`,`language`,`hours`,`note` FROM `formdata` WHERE id = " . $_GET['id'];
$result = $conn->query($sql)
?>
    <a href = "index.php">Home</a> |
    <a href = "form.php">Form></a>
    <a href = "list.php">List</a>
    <br>
    <h1>
        Update Form
    </h1>
    <p>
        <form action = "update-process.php" method = "post">
            <input type=text name = "id" value="<?php echo $_GET['id']; ?>"><br><br>
            <input type=text name = "name" value="<?php echo $result->fetch_assoc()['name']; ?>"><br>
            <br><pre><?php
            //$result->fetch_assoc()["name"];
            ?></pre>
            <br><br>
        Name: <input type = "text" name = "name" placeholder="Enter Name Here"> <BR>
        Email: <input type = "email" name = "email" value = "selfridge@gmail.com"> <BR>
        Language: <select name="language">
            <option value="C++">C++</option>
            <option value = "PHP" selected> PHP</option>
            <option value="C#">C#</option>
            <option value="Javascript">JS</option>
        </select><br>
        Preferred Hours:<input type="radio" name = "hours" value = "early bird"> Early Bird | 
        <input type="radio" name = "hours" value = "night owl"> Night Owll <br>
        Hobbies: <input type="checkbox" name="hobbies[]" value = "Bowling">Bowling |
        <input type="checkbox" name="hobbies[]" value = "Cars">Cars|
        <input type="checkbox" name="hobbies[]"value = "Music">Music|
        <input type="checkbox" name="hobbies[]"value = "Motorcycles">Motorcylces|
        <input type="checkbox" name="hobbies[]"value = "Model Building">Model Building |
        <input type="checkbox" name="hobbies[]" value = "3d printing">3d Printing<br>
        Note: <br>
        <textarea name="note" value = "note" cols = "30" rows = "10">My
First
Textbox
</textarea> <br>
            <input type="submit" value = "SEND"> | 
            <input type="reset" value = "Start Over">
</form>
</p>
</body>
</html>