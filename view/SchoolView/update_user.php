<?php
$obj = $obj[0];
?>
<form method="post">
    First name: <input name="firstName" value="<?= $obj['voornaam'] ?>">
    <br>
    <br>
    Infix: <input name="infix" value="<?= $obj['tussenvoegsel'] ?>">
    <br>
    <br>
    Last name: <input name="lastName" value="<?= $obj['achternaam'] ?>">
    <br>
    <br>
    Email: <input type="email" name="email" value="<?= $obj['email'] ?>">
    <br>
    <br>
    Password: <input type="password" name="password">
    <br>
    <br>
    Phone: <input type="tel" name="phone" value="<?= $obj['telefoonnummer'] ?>">
    <br>
    <br>
    Is mentor: <input type="checkbox" name="isTeacher" <?= $obj['is_schoolmentor'] === 1 ? 'checked' : '' ?>>
    <br>
    <br>
    Is stagebegeleider: <input type="checkbox" name="isSchoolSupervisor" <?= $obj['is_stagebegeleider'] === 1 ? 'checked' : '' ?>>
    <br>
    <br>
    Is school account: <input type="checkbox" name="isSchoolAccount" <?= $obj['is_schoolaccount'] === 1 ? 'checked' : '' ?>>
    <br>
    <br>
    Is vertrouwenspersoon: <input type="checkbox" name="isHumanResources" <?= $obj['is_vertrouwenspersoon'] === 1 ? 'checked' : '' ?>>
    <br>
    <br>
    Is ouder: <input type="checkbox" name="isParent" <?= $obj['is_ouder'] === 1 ? 'checked' : '' ?>>
    <br>
    <br>
    School: <input name="school" value="<?= $obj['schoolnaam'] ?>">
    <br>
    <br>
    Study: <input name="study" value="<?= $obj['studie'] ?>">
    <br>
    <br>
    <input value="Submit" type="submit" name="submit">
</form>