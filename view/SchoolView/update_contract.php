<?php
$obj = $obj[0];
?>
<form method="post">
    Stagiair id: <?= $selectStudent ?>
    <br>
    <br>
    Stagebedrijf id: <?= $selectCompany ?>
    <br>
    <br>
    Benodigde aantal uren: <input type="number" name="mandatoryHours" value="<?= $obj['aantal_uren_nodig'] ?>">
    <br>
    <br>
    Goedgekeurde uren: <input type="number" name="approvedHours" value="<?= $obj['aantal_uren_goedgekeurd'] ?>">
    <br>
    <br>
    Startdatum: <input type="date" name="startDate" value="<?= $obj['start_datum'] ?>">
    <br>
    <br>
    Eindatum: <input type="date" name="endDate" value="<?= $obj['eind_datum'] ?>">
    <br>
    <br>
    Is afgerond: <input type="checkbox" name="finished" <?= $obj['is_afgerond'] !== 0 ? 'checked' : '' ?>>
    <br>
    <br>
    Stagebegeleider id: <?= $selectSchoolSupervisor ?>
    <br>
    <br>
    School mentor id: <?= $selectTeacher ?>
    <br>
    <br>
    Ouder id: <?= $selectParent ?>
    <br>
    <br>
    Vertrouwenspersoon id: <?= $selectHumanResources ?>
    <br>
    <br>
    School account id: <?= $selectSchoolAccount ?>
    <br>
    <br>
    <input value="Submit" type="submit" name="submit">
</form>