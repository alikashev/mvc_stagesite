<style>
    .inputs {
        margin-bottom: 1rem;
    }
</style>
<form method="post">
    <div class="inputs">
        Stagiair id: <?=$obj2?>
    </div>
    <div class="inputs">
        Stagebedrijf id: <?=$obj3?>
    </div>
    <div class="inputs">
        Benodigde aantal uren: <input type="number" name="mandatoryHours">
    </div>
    <div class="inputs">
        Goedgekeurde uren: <input type="number" name="approvedHours">
    </div>
    <div class="inputs">
        Startdatum: <input required type="date" name="startDate">
    </div>
    <div class="inputs">
        Eindatum: <input required type="date" name="endDate">
    </div>
    <div class="inputs">
        Is afgerond: <input type="checkbox" name="finished">
    </div>
    <div class="inputs">
        Pratijkbegeleider id: <?=$obj?>
    </div>
    <div class="inputs">
        Stagebegeleider id: <?= $selectSchoolSupervisor ?>
    </div>
    <div class="inputs">
        Schoolaccount id: <?= $selectSchoolAccount ?>
    </div>
    <div class="inputs">
        Schoolmentor id: <?= $selectTeacher ?>
    </div>
    <div class="inputs">
        Vertrouwenspersoon id: <?= $selectHumanResources ?>
    </div>
    <div class="inputs">
        Ouder id: <?= $selectParent ?>
    </div>
  <input value="Submit" type="submit" name="submit">
</form>