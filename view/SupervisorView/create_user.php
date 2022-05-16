<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create - MVC</title>
    <style>
        form {
            padding: 1rem;
        }
    </style>
</head>
<body>
        <form method="POST">
            <div class="mb-3">
                <label for="firstName" class="form-label">Voornaam</label>
                <input name="firstName" type="text" class="form-control" id="firstName">
            </div>
            <div class="mb-3">
                <label for="infix" class="form-label">Tussenvoegsel</label>
                <input name="infix" type="text" id="infix" class="form-control">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Achternaam</label>
                <input name="lastName" type="text" id="lastName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Wachtwoord</label>
                <input required name="password" type="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control">
            </div>
            <div class="mb-3">
                <input type="checkbox" name="isTeacher" id="isTeacher" class="form-check-input">
                <label for="isTeacher" class="form-check-label">Schoolmentor</label>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="isSchoolSupervisor" id="isSchoolSupervisor" class="form-check-input">
                <label for="isSchoolSupervisor" class="form-check-label">Stagebegeleider</label>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="isSchoolAccount" id="isSchoolAccount" class="form-check-input">
                <label for="isSchoolAccount" class="form-check-label">Schoolaccount</label>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="isHumanResources" id="isHumanResources" class="form-check-input">
                <label for="isHumanResources" class="form-check-label">Vertrouwenspersoon</label>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="isParent" id="isParent" class="form-check-input">
                <label for="isParent" class="form-check-label">Ouder</label>
            </div>
            <div class="mb-3">
                <label for="school" class="form-label">School</label>
                <input type="text" name="school" id="school" class="form-control">
            </div>
            <div class="mb-3">
                <label for="study" class="form-label">Study</label>
                <input type="text" name="study" id="study" class="form-control">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
    </form>
</body>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>