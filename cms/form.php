<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, intial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <a href = "index.php">Home</a> |
    <a href = "form.php">Form></a>
    <br>
    <h1>
        Form
    </h1>
    <p>
        <form action = "form-process.php" method = "post">
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