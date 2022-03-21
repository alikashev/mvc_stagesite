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
                <label for="firstName">First name:</label>
                <input name="firstName" type="text">
            </div>
            <div class="inputs infix">
                <label for="infix">Infix: </label>
                <input name="infix" type="text">
            </div>
            <div class="inputs last_name">
                <label for="lastName">Last name:</label>
                <input name="lastName" type="text">
            </div>
            <div class="inputs password">
                <label for="password">Password: </label>
                <input required name="password" type="password">
            </div>
            <div class="inputs email">
                <label for="email">Email: </label>
                <input required type="email" name="email">
            </div>
            <div class="inputs phone">
                <label for="phone">Phone: </label>
                <input type="tel" name="phone">
            </div>
            <div class="inputs is_teacher">
                <label for="isTeacher">Is Teacher: </label>
                <input type="checkbox" name="isTeacher">
            </div>
            <div class="inputs is_supervisor">
                <label for="isSupervisor">Is Supervisor: </label>
                <input type="checkbox" name="isSupervisor">
            </div>
            <div class="inputs school">
                <label for="school">School: </label>
                <input type="text" name="school">
            </div>
            <div class="inputs study">
                <label for="study">Study: </label>
                <input type="text" name="study">
            </div>
            <input type="submit" name="submit" value="Submit">
    </div>
    </form>
</body>

</html>