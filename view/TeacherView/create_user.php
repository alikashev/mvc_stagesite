<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create - MVC</title>
    <style>
        .inputs {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
        <form method="POST">
            <div class="inputs first_name">
                <label for="first_name">Voornaam: </label>
                <input name="firstName" type="text" id="first_name">
            </div>
            <div class="inputs infix">
                <label for="infix">Tussenvoegsel: </label>
                <input name="infix" type="text" id="infix">
            </div>
            <div class="inputs last_name">
                <label for="last_name">Achternaam:</label>
                <input name="lastName" type="text" id="last_name">
            </div>
            <div class="inputs password">
                <label for="password">Wachtwoord: </label>
                <input required name="password" type="password" id="password">
            </div>
            <div class="inputs email">
                <label for="email">Email: </label>
                <input required type="email" name="email" id="email">
            </div>
            <div class="inputs phone">
                <label for="phone">Telefoonnummer: </label>
                <input type="tel" name="phone" id="phone">
            </div>
            <div class="inputs school">
                <label for="school">School: </label>
                <input type="text" name="school" id="school">
            </div>
            <div class="inputs study">
                <label for="study">Studie: </label>
                <input type="text" name="study" id="study">
            </div>
            <div class="inputs is_parent">
                <label for="is_parent">Is Ouder:</label>
                <input type="checkbox" name="isParent" id="is_parent">
            </div>
            <input type="submit" name="submit" value="Submit">
    </div>
    </form>
</body>

</html>