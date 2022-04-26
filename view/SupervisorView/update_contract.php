<style>
    .inputs {
        margin-bottom: 1rem;
    }
</style>
<?php
$obj = $obj[0];
?>
<form method="post">
    <div class="inputs">
        Stagiair id: <?= $selectStudent ?>
    </div>
    <div class="inputs">
        Stagebedrijf id: <?= $selectCompany ?>
    </div>
    <div class="inputs">
        Benodigde aantal uren: <label>
            <input type="number" name="mandatoryHours" value="<?= $obj['aantal_uren_nodig'] ?>">
        </label>
    </div>
    <div class="inputs">
        Goedgekeurde uren: <label>
            <input type="number" name="approvedHours" value="<?= $obj['aantal_uren_goedgekeurd'] ?>">
        </label>
    </div>
    <div class="inputs">
        Startdatum: <label>
            <input type="date" name="startDate" value="<?= $obj['start_datum'] ?>">
        </label>
    </div>
    <div class="inputs">
        Eindatum: <label>
            <input type="date" name="endDate" value="<?= $obj['eind_datum'] ?>">
        </label>
    </div>
    <div class="inputs">
        Is afgerond: <label>
            <input type="checkbox" name="finished" <?= $obj['is_afgerond'] !== 0 ? 'checked' : '' ?>>
        </label>
    </div>
    <div class="inputs">
        Stagebegeleider id: <?= $selectSchoolSupervisor ?>
    </div>
    <div class="inputs">
        Schoolmentor id: <?= $selectTeacher ?>
    </div>
    <div class="inputs">
        Ouder id: <?= $selectParent ?>
    </div>
    <div class="inputs">
        Vertrouwenspersoon id: <?= $selectHR ?>
    </div>
    <div class="inputs">
        Schoolaccount id: <?= $selectSchoolAccount ?>
    </div>
    <input value="Submit" type="submit" name="submit">
</form>