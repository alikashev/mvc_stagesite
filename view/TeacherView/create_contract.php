<style>
    .inputs {
        margin-bottom: 1rem;
    }
</style>
<form method="post">
    <div class="inputs">
        Stagiair id: <?= $obj2 ?>
    </div>
    <div class="inputs">
        Stagebedrijf id: <?= $obj3 ?>
    </div>
    <div class="inputs">
        Benodigde aantal uren: <label>
            <input required type="number" name="mandatoryHours">
        </label>
    </div>
    <div class="inputs">
        Goedgekeurde uren: <label>
            <input required type="number" name="approvedHours">
        </label>
    </div>
    <div class="inputs">
        Startdatum: <label>
            <input required type="date" name="startDate">
        </label>
    </div>
    <div class="inputs">
        Einddatum: <label>
            <input required type="date" name="endDate">
        </label>
    </div>
    <div class="inputs">
        Is afgerond: <label>
            <input type="checkbox" name="finished">
        </label>
    </div>
    <div class="inputs">
        Praktijkbegeleider id: <?= $obj ?>
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