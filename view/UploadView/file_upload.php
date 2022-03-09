<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload bestand</title>
</head>
<body>

    <form action="../../model/uploadLogic.php" method="POST" enctype="multipart/form-data">
        <label>Filenaam</label>
        <input type="text" name="filename" required >
        <label>File Upload</label>
        <input type="File" name="file" required >
        <input type="submit" name="submit">
    </form>
    
</body>
</html>