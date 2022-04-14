<?php
$obj = $obj[0];
?>
<style>
    .inputs {
        margin-bottom: 1rem;
    }
</style>
<form method="post">
    <div class="inputs">
        Stagiair id: <?= $selectStudent ?>
    </div>
    <div class="inputs">
        Stagebedrijf id: <?= $selectCompany ?>
    </div>
    <div class="inputs">
        Benodigde aantal uren: <input type="number" name="mandatoryHours" value="<?=$obj['aantal_uren_nodig']?>">
    </div>
    <div class="inputs">
        Goedgekeurde uren: <input type="number" name="approvedHours" value="<?=$obj['aantal_uren_goedgekeurd']?>">
    </div>
    <div class="inputs">
        Startdatum: <input required type="date" name="startDate" value="<?=$obj['start_datum']?>">
    </div>
    <div class="inputs">
        Eindatum: <input required type="date" name="endDate" value="<?=$obj['eind_datum']?>">
    </div>
    <div class="inputs">
        Is afgerond: <input type="checkbox" name="finished" <?=$obj['is_afgerond'] !== 0 ? 'checked' : ''?>>
    </div>
    <div class="inputs">
        Praktijkbegeleider id: <?= $selectSupervisor ?>
    </div>
    <div class="inputs">
        Stagebegeleider id: <?= $selectSchoolSupervisor ?>
    </div>
    <div class="inputs">
        Schoolmentor id: <?= $selectTeacher ?>
    </div>
    <div class="inputs">
        Vertrouwenspersoon id: <?= $selectHumanResources ?>
    </div>
    <div class="inputs">
        Schoolaccount id: <?= $selectSchoolAccount ?>
    </div>
    <div class="inputs">
        Ouder id: <?= $selectParent ?>
    </div>
  <input value="Submit" type="submit" name="submit">
</form>