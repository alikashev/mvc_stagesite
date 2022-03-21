<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload bestand</title>
</head>
<body>

    <form action="../collectUploadFile" method="POST" enctype="multipart/form-data">
        <label>Filenaam</label><br>
        <input type="text" name="filedesc" required ><br>
        <label>File Upload</label><br>
        <input type="File" name="file" required ><br>
        <input type="submit" name="submit">
    </form>
    
</body>
</html>