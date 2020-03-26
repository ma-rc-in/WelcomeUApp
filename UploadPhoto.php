

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Self-enrolment page __ Step 2</title>
</head>
<body>
<h2>Upload SmartCard Photo</h2>
<form action="imageHandling.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <label for="file">Filename:</label>
        <input type="file" name= "myfile" id="myfile" />
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>
</body>
</html>