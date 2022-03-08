<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create - MVC</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="container">
        <form action="./index.php?action=create" method="POST">
            <div class="name">
                <label for="name">Voor en achternaam</label>
                <input name="contact_name" type="text">
            </div>
            <div class="email">
                <label for="email">E-mail</label>
                <input name="contact_email" type="text">
            </div>
            <div class="adress">
                <label for="adress">Adres</label>
                <input name="contact_adress" type="text">
                <button class="btn" type="submit">Maak contact aan</button>
            </div>
        </form>
    </div>
</body>
</html>