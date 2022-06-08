<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload bestand</title>
</head>
<body>

    <form action="<?= SERVER_URL ?>/UploadsController/collectUploadFile" method="POST" enctype="multipart/form-data">
        <label>File omschrijving</label><br>
        <textarea name="filedesc" required ></textarea><br>
        <label>File Upload</label><br>
        <input type="File" name="file" required ><br>
        <input type="submit" name="submit">
    </form>
    
</body>
</html>