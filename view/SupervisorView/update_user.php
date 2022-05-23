<?php
$obj = $obj[0];
?>
<style>
    form {
        padding: 1rem;
    }
</style>
<form method="post">
    <div class="mb-3">
        <label for="firstName" class="form-label">Voornaam</label>
        <input name="firstName" type="text" class="form-control" id="firstName" value="<?= $obj['voornaam'] ?>">
    </div>
    <div class="mb-3">
        <label for="infix" class="form-label">Tussenvoegsel</label>
        <input name="infix" type="text" id="infix" class="form-control" value="<?= $obj['tussenvoegsel'] ?>">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Achternaam</label>
        <input name="lastName" type="text" id="lastName" class="form-control" value="<?= $obj['achternaam'] ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Wachtwoord</label>
        <input name="password" type="password" id="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input required type="email" name="email" id="email" class="form-control" value="<?= $obj['email'] ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" name="phone" id="phone" class="form-control" value="<?= $obj['telefoonnummer'] ?>">
    </div>
    <div class="mb-3">
        <input type="checkbox" name="isTeacher" id="isTeacher"
               class="form-check-input" <?= $obj['is_schoolmentor'] === 1 ? 'checked' : '' ?>>
        <label for="isTeacher" class="form-check-label">Schoolmentor</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="isSchoolSupervisor" id="isSchoolSupervisor"
               class="form-check-input" <?= $obj['is_stagebegeleider'] === 1 ? 'checked' : '' ?>>
        <label for="isSchoolSupervisor" class="form-check-label">Stagebegeleider</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="isSchoolAccount" id="isSchoolAccount"
               class="form-check-input" <?= $obj['is_schoolaccount'] === 1 ? 'checked' : '' ?>>
        <label for="isSchoolAccount" class="form-check-label">Schoolaccount</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="isHumanResources" id="isHumanResources"
               class="form-check-input" <?= $obj['is_vertrouwenspersoon'] === 1 ? 'checked' : '' ?>>
        <label for="isHumanResources" class="form-check-label">Vertrouwenspersoon</label>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="isParent" id="isParent"
               class="form-check-input" <?= $obj['is_ouder'] === 1 ? 'checked' : '' ?>>
        <label for="isParent" class="form-check-label">Ouder</label>
    </div>
    <div class="mb-3">
        <label for="school" class="form-label">School</label>
        <input type="text" name="school" id="school" class="form-control" value="<?= $obj['schoolnaam'] ?>">
    </div>
    <div class="mb-3">
        <label for="study" class="form-label">Study</label>
        <input type="text" name="study" id="study" class="form-control" value="<?= $obj['studie'] ?>">
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>