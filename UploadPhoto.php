

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Self-enrolment page __ Step 2</title>

    <script src="1-basics.js"></script>
    <style>
        #vid-show, #vid-canvas, #vid-take {
            display: block;
            margin-bottom: 20px;
        }
        html, body {
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
<h2>Upload SmartCard Photo</h2>
<form action="imageHandling.php" method="post" enctype="multipart/form-data">

        <div id="vid-controls">
            <video id="vid-show" autoplay></video>
            <input id="vid-take" type="button" value="Take Photo"/>
            <div id="vid-canvas"></div>
        </div>
    
        <label for="file">Filename:</label>
        <input type="file" name= "myfile" id="myfile" />
        <br/><br/>
        <input type="submit" name="submit" value="Submit" />

</form>
</body>
</html>